<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:xs="http://www.w3.org/2001/XMLSchema" xmlns:fn="http://www.w3.org/2005/xpath-functions">
	<xsl:output method="xml" version="1.0" encoding="ISO-8859-1" indent="yes"/>
	
	<xsl:template match="/">
		<html>
			<head>
				<title>Meus livros</title>
			</head>
			<body>
				<table border="2">
						<tr>
							<th>Título</th>
							<th>Autor</th>
						</tr>
						<xsl:for-each select="/livros/livro">
							<xsl:call-template name="tratalivro"/>
						</xsl:for-each>
				</table>
			</body>
		</html>
	</xsl:template>
	
	<xsl:template name="tratalivro">
		<tr>
			<td>
				<xsl:value-of select="titulo"/>
			</td>
			<td>
				<xsl:value-of select="autor"/>
			</td>
		</tr>
	</xsl:template>
</xsl:stylesheet>
