<?php

interface MessageInterface {
    function _read();
    function _save_messages();
    function _read_messages();
}

class NoteService implements MessageInterface {
    private $dbFile = "notes.db";
    private $dbh;

    public function _read() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $topic = trim(isset($_POST['topic']) ? $_POST['topic'] : '');
            $content = trim(isset($_POST['content']) ? $_POST['content'] : '');
            if (!empty($topic) && !empty($content)) {
                return ['topic' => $topic, 'content' => $content];
            }
        }
        return null;
    }

    public function _save_messages() {
        $data = $this->_read();
        if ($data) {
            $this->dbh = dba_open($this->dbFile, "c");
            if (!$this->dbh) {
                die("Nie można otworzyć bazy danych.");
            }

            $timestamp = time();

            $serialized_data = serialize([
                'topic' => $data['topic'],
                'content' => $data['content'],
                'date' => date('Y-m-d H:i:s', $timestamp)
            ]);

            dba_insert($timestamp, $serialized_data, $this->dbh);

            dba_close($this->dbh);
        }
    }

    public function _read_messages() {
        $this->dbh = dba_open($this->dbFile, "c");
        if (!$this->dbh) {
            die("Nie można otworzyć bazy danych.");
        }

        $messages = [];
        $key = dba_firstkey($this->dbh);
        while ($key !== false) {
            $data = unserialize(dba_fetch($key, $this->dbh));
            $messages[$key] = $data;
            $key = dba_nextkey($this->dbh);
        }

        dba_close($this->dbh);
        return $messages;
    }
}
