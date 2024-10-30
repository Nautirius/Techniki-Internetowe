<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" >
    <xsl:output method="html" version="1.0"
                indent="yes" doctype-system="about:legacy-compact" />
    <!-- szablon dopasowujacy sie do korzenia dokumentu XML -->
    <xsl:template match="/">
        <html>
            <head>
                <title>
                    Ćwiczenie 4
                </title>
                <style>
                    body { color: blue; }
                    h1 { font-weight: normal; text-align: center; }
                    h2 { font-weight: normal; }
                    pre { padding: 5px; border: 2px solid blue; }
                </style>
            </head>
            <body>
                <h1>
                    Laboratorium 4 - Ćwiczenia
                </h1>
                <!-- lista lab  w -->
                <ul>
                    <xsl:for-each select="//lab">
                        <xsl:call-template name="lab-link" />
                    </xsl:for-each>
                </ul>

                <!-- laby -->

                <xsl:for-each select="//lab">
                    <xsl:call-template name="lab" />
                </xsl:for-each>

            </body>
        </html>
    </xsl:template>

    <xsl:template name="lab-link" >
        <li>
            <p><xsl:value-of select="title"/></p>
        </li>
    </xsl:template>

    <xsl:template name="lab" >
        <h2><xsl:value-of select="title"/></h2>
        <em><xsl:value-of select="description"/></em>
        <pre><xsl:value-of select="code"/></pre>
    </xsl:template>


</xsl:stylesheet>
