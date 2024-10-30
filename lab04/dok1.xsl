<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" version="1.0"
                indent="yes" doctype-system="about:legacy-compact" />
    <!-- szablon dopasowujacy sie do korzenia dokumentu XML -->
    <xsl:template match="/">
        <html>
            <head>
                <title>Ćwiczenie 4</title>
                <style>
                    body { color: blue; }
                    h1 { font-weight: normal; text-align: center; }
                    h2 { font-weight: normal; }
                    a { text-decoration: none; }
                    pre { padding: 5px; border: 2px solid blue; }
                </style>
            </head>
            <body>
                <h1>Laboratorium 4 - Ćwiczenia</h1>

                <!-- lista lab z linkami -->
                <ul>
                    <xsl:for-each select="//lab">
                        <xsl:call-template name="lab-link" />
                    </xsl:for-each>
                </ul>

                <!-- sekcje dla każdego lab -->
                <xsl:for-each select="//lab">
                    <xsl:call-template name="lab" />
                </xsl:for-each>
            </body>
        </html>
    </xsl:template>

    <!-- Szablon do tworzenia linków -->
    <xsl:template name="lab-link">
        <li>
            <a href="#{generate-id()}">
                <xsl:value-of select="title"/>
            </a>
        </li>
    </xsl:template>

    <!-- Szablon do wyświetlania sekcji lab -->
    <xsl:template name="lab">
        <h2 id="{generate-id()}">
            <xsl:value-of select="title"/>
        </h2>
        <em>
            <xsl:apply-templates select="description"/>
        </em>
        <pre><xsl:value-of select="code"/></pre>
    </xsl:template>

    <!-- Szablon do przetwarzania opisu ze znacznikami <b> -->
    <xsl:template match="description">
        <xsl:apply-templates/>
    </xsl:template>

    <!-- Szablon do konwersji znaczników <b> -->
    <xsl:template match="b">
        <b><xsl:value-of select="."/></b>
    </xsl:template>
</xsl:stylesheet>
