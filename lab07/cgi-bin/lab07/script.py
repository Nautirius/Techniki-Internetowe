#!/usr/bin/python3
import os
import json
import sys
import cgi
import cgitb

cgitb.enable()

FILE_PATH = "votes.json"

def init_votes():
    if not os.path.exists(FILE_PATH)or os.path.getsize(FILE_PATH) == 0:
        with open(FILE_PATH, 'w') as f:
            json.dump([0, 0, 0, 0], f)

def read_votes():
    with open(FILE_PATH, 'r') as f:
        return json.load(f)

def save_votes(votes):
    with open(FILE_PATH, 'w') as f:
        json.dump(votes, f)

def main():
    print("Content-Type: application/json")
    print()

    init_votes()

    content_length = int(os.environ.get('CONTENT_LENGTH', 0))
    post_data = sys.stdin.read(content_length)

    try:
        request_data = json.loads(post_data)
        answer = int(request_data.get('answer'))

        votes = read_votes()

        if 0 <= answer < len(votes):
            votes[answer] += 1
            save_votes(votes)

        print(json.dumps(votes))
    except (ValueError, KeyError, json.JSONDecodeError):
        print(json.dumps(read_votes()))

if __name__ == "__main__":
    main()
