<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">

<xsl:param name="selectedYear" />
<xsl:param name="selectedCategory"/>
<xsl:param name="selectedNominee"/>
<xsl:param name="selectedInfo"/>
<xsl:param name="selectedWon"/>

<xsl:template match="Oscars" name = "output">
<html>
<body>
<h1>Search Results</h1>
<table style = "text-align: left">
<tr>
<th>Year</th>
<th>Category</th>
<th>Nominee</th>
<th>Info</th>
<th>Won?</th>
</tr>

<xsl:for-each select = "Nomination[contains(Year, $selectedYear)][contains(Category, $selectedCategory)]
[contains(Nominee, $selectedNominee)][contains(Info, $selectedInfo)][contains(Won, $selectedWon)]">
<tr>
<td>
<xsl:value-of select="Year"/>
</td>
<td>
<xsl:value-of select="Category"/>
</td>
<td>
<xsl:value-of select="Nominee"/>
</td>
<td>
<xsl:value-of select="Info"/>
</td>
<td>
<xsl:value-of select="Won"/>
</td>
</tr>
</xsl:for-each>
</table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>