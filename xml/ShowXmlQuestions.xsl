<?xml version="1.0"?>
<xsl:stylesheet version="1.0" 
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<HTML>
	<style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
	<BODY>
		<TABLE border="0">
			<THEAD><TR><TH>EGILEA</TH><TH>GAIA</TH><TH>GALDERA</TH><TH>ZUZENA</TH><TH>OKERRAK</TH></TR></THEAD>
			<xsl:for-each select="/assessmentItems/assessmentItem" >
			<TR><TD><FONT SIZE="2" COLOR="black" FACE="Verdana">
					<xsl:value-of select="./@author"/> <BR/>
				</FONT></TD>
				<TD><FONT SIZE="2" COLOR="black" FACE="Verdana">
					<xsl:value-of select="./@subject"/> <BR/>
				</FONT></TD>
				<TD><FONT SIZE="2" COLOR="black" FACE="Verdana">
					<xsl:value-of select="itemBody/p"/> <BR/>
				</FONT></TD>
				<TD><FONT SIZE="2" COLOR="black" FACE="Verdana">
					<xsl:value-of select="correctResponse/response"/> <BR/>
				</FONT></TD>
				<TD><FONT SIZE="2" COLOR="black" FACE="Verdana">
					<xsl:value-of select="incorrectResponses"/> <BR/>
				</FONT></TD>
			</TR>
			</xsl:for-each>
		</TABLE>
	</BODY>
</HTML>
</xsl:template>
</xsl:stylesheet>