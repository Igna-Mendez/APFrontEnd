<% on error resume next %>
<p>
<TABLE align=center border=0 cellPadding=1 cellSpacing=1 width=75%>
    
    <TR>
        <TD>
<font face="<% =DefaultFontFace %>">Los campos marcados con  
	<FONT color=#ff0000 size=4><STRONG>*</STRONG></FONT>
	son imprescindibles</font>
   <TABLE bgColor=#b0c4de border=1 cellPadding=0 cellSpacing=0 width=100% background="" borderColor="#000000">
                
                <TR>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=2>Usuario <FONT color=#ff0000>*</FONT></td>
                    <TD width="50%"><font face="<% =DefaultFontFace %>" size=3>
                        <INPUT name="Name" size="30"  value="<%=Request.Form("name") %>"> </td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Contraseña <FONT color=red face="">*</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                        <INPUT name="password" type=password size="30" value="<%=Request.Form("password") %>">
                        <INPUT name="password-d" type=hidden value="<%=Request.Form("password") %>"></td>
<% if Request.QueryString("mode") <> "go" then %>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Repetición de contraseña <FONT color=#ff0000 face="">*</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                        <INPUT name="password2" type=password size="30"></td>
<% End If %>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Dirección de Email <FONT color=#ff0000 face="">*</FONT></td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                        <INPUT  name="email" size="30" value="<%=RS("M_email") %>"></td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>WebSite </td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                        <INPUT name="homepage" size="30" value="<%=RS("M_HomePage") %>"></td>
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Número de ICQ </td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                        <INPUT name="ICQ" size="30" value="<%=RS("M_ICQ") %>"></td>                        
                <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>País</td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                    <select name="Country" size="1">


         <OPTION selected VALUE="<%=RS("M_Country") %>"><%=RS("M_Country") %>

                        <OPTION VALUE="Albania">Albania
                        <OPTION VALUE="Algeria">Algeria
                        <OPTION VALUE="Andorra">Andorra
                        <OPTION VALUE="Angola">Angola
                        <OPTION VALUE="Anguilla">Anguilla
                        <OPTION VALUE="Antigua and Barbuda">Antigua and Barbuda
                        <OPTION VALUE="Argentina">Argentina
                        <OPTION VALUE="Armenia">Armenia
                        <OPTION VALUE="Aruba">Aruba
                        <OPTION VALUE="Australia">Australia
                        <OPTION VALUE="Austria">Austria
                        <OPTION VALUE="Azerbaijan">Azerbaijan
                        <OPTION VALUE="Azores">Azores
                        <OPTION VALUE="Bahamas">Bahamas
                        <OPTION VALUE="Bahrain">Bahrain
                        <OPTION VALUE="Bangladesh">Bangladesh
                        <OPTION VALUE="Barbados">Barbados
	                    <OPTION VALUE="Belarus">Belarus
                        <OPTION VALUE="Belgium">Belgium
                        <OPTION VALUE="Belize">Belize
                        <OPTION VALUE="Benin">Benin
                        <OPTION VALUE="Bermuda">Bermuda
                        <OPTION VALUE="Bhutan">Bhutan
                        <OPTION VALUE="Bolivia">Bolivia
                        <OPTION VALUE="Borneo">Borneo
                        <OPTION VALUE="Bosnia and Herzegovina">Bosnia and Herzegovina
                        <OPTION VALUE="Botswana">Botswana
                        <OPTION VALUE="Brazil">Brazil
                        <OPTION VALUE="British Indian Ocean Territories">British Indian Ocean Territories
                        <OPTION VALUE="Brunei">Brunei
                        <OPTION VALUE="Bulgaria">Bulgaria
                        <OPTION VALUE="Burkina Faso (Upper Volta)">Burkina Faso (Upper Volta)
                        <OPTION VALUE="Burundi">Burundi
                        <OPTION VALUE="Camaroon">Camaroon
                        <OPTION VALUE="Cambodia (Kampuchea)">Cambodia (Kampuchea)
                        <OPTION VALUE="Canada">Canada
                        <OPTION VALUE="Canary Islands">Canary Islands
                        <OPTION VALUE="Cape Vere Islands">Cape Vere Islands
                        <OPTION VALUE="Cayman Island">Cayman Island
                        <OPTION VALUE="Central African Rep">Central African Rep
                        <OPTION VALUE="Chad">Chad
                        <OPTION VALUE="Chile">Chile
                        <OPTION VALUE="China">China
                        <OPTION VALUE="Christmas Island">Christmas Island
                        <OPTION VALUE="Colombia">Colombia
                        <OPTION VALUE="Comoros Islands">Comoros Islands
                        <OPTION VALUE="Congo, Democratic Republic of">Congo, Democratic Republic of
                        <OPTION VALUE="Costa Rica">Costa Rica
                        <OPTION VALUE="Croatia">Croatia
                        <OPTION VALUE="Cuba">Cuba
                        <OPTION VALUE="Cyprus">Cyprus
                        <OPTION VALUE="Czech Republic">Czech Republic
                        <OPTION VALUE="Denmark">Denmark
                        <OPTION VALUE="Djibouti">Djibouti
                        <OPTION VALUE="Dominica">Dominica
                        <OPTION VALUE="Dominican Republic">Dominican Republic
                        <OPTION VALUE="East Timor">East Timor
                        <OPTION VALUE="Ecuador">Ecuador
                        <OPTION VALUE="Egypt">Egypt
                        <OPTION VALUE="El Salvador">El Salvador
                        <OPTION VALUE="Equatorial Guinea">Equatorial Guinea
                        <OPTION VALUE="Eritria">Eritria
                        <OPTION VALUE="Estonia">Estonia
                        <OPTION VALUE="Ethiopia">Ethiopia
                        <OPTION VALUE="Falkland Islands">Falkland Islands
                        <OPTION VALUE="Faroe Islands">Faroe Islands
                        <OPTION VALUE="Fed Rep Yugoslavia">Fed Rep Yugoslavia
                        <OPTION VALUE="Fiji">Fiji
                        <OPTION VALUE="Finland">Finland
                        <OPTION VALUE="France">France
                        <OPTION VALUE="French Guiana">French Guiana
                        <OPTION VALUE="French Polynesia">French Polynesia
                        <OPTION VALUE="Fyro Macedonia">Fyro Macedonia
                        <OPTION VALUE="Gabon">Gabon
                        <OPTION VALUE="Gambia">Gambia
                        <OPTION VALUE="Georgia">Georgia
                        <OPTION VALUE="Germany">Germany
                        <OPTION VALUE="Ghana">Ghana
                        <OPTION VALUE="Gibraltar">Gibraltar
                        <OPTION VALUE="Greece">Greece
                        <OPTION VALUE="Greenland">Greenland
                        <OPTION VALUE="Grenada">Grenada
                        <OPTION VALUE="Guadeloupe">Guadeloupe
                        <OPTION VALUE="Guatemala">Guatemala
                        <OPTION VALUE="Guinea">Guinea
                        <OPTION VALUE="Guinea-Bissau">Guinea-Bissau
                        <OPTION VALUE="Guyana">Guyana
                        <OPTION VALUE="Haiti">Haiti
                        <OPTION VALUE="Honduras">Honduras
                        <OPTION VALUE="Hong Kong">Hong Kong
                        <OPTION VALUE="Hungary">Hungary
                        <OPTION VALUE="Iceland">Iceland
                        <OPTION VALUE="India">India
                        <OPTION VALUE="Indonesia">Indonesia
                        <OPTION VALUE="Iran">Iran
                        <OPTION VALUE="Iraq">Iraq
                        <OPTION VALUE="Ireland">Ireland
                        <OPTION VALUE="Israel">Israel
                        <OPTION VALUE="Italy">Italy
                        <OPTION VALUE="Ivory Coast">Ivory Coast
                        <OPTION VALUE="Jamaica">Jamaica
                        <OPTION VALUE="Japan">Japan
                        <OPTION VALUE="Jordan">Jordan
                        <OPTION VALUE="Kazakhstan">Kazakhstan
                        <OPTION VALUE="Kenya">Kenya
                        <OPTION VALUE="Kiribati">Kiribati
                        <OPTION VALUE="Korea">Korea
                        <OPTION VALUE="Kuwait">Kuwait
                        <OPTION VALUE="Kyrgyzstan">Kyrgyzstan
                       <OPTION VALUE="Laos">Laos
                        <OPTION VALUE="Latvia">Latvia
                        <OPTION VALUE="Lebanon">Lebanon
                        <OPTION VALUE="Lesotho">Lesotho
                        <OPTION VALUE="Liberia">Liberia
                        <OPTION VALUE="Libya">Libya
                        <OPTION VALUE="Liechtenstein">Liechtenstein
                        <OPTION VALUE="Lithuania">Lithuania
                        <OPTION VALUE="Luxembourg">Luxembourg
                        <OPTION VALUE="Macao">Macao
                        <OPTION VALUE="Madagascar">Madagascar
                        <OPTION VALUE="Malawi">Malawi
                       <OPTION VALUE="Malaysia">Malaysia
                      <OPTION VALUE="Maldives">Maldives
                        <OPTION VALUE="Mali">Mali
                        <OPTION VALUE="Malta">Malta
                        <OPTION VALUE="Martinique">Martinique
                        <OPTION VALUE="Mauritania">Mauritania
                        <OPTION VALUE="Mauritius">Mauritius
                        <OPTION VALUE="Mexico">Mexico
                        <OPTION VALUE="Moldova">Moldova
                        <OPTION VALUE="Monaco">Monaco
                        <OPTION VALUE="Mongolia">Mongolia
                        <OPTION VALUE="Montserrat">Montserrat
                        <OPTION VALUE="Morocco">Morocco
                        <OPTION VALUE="Mozambique">Mozambique
                        <OPTION VALUE="Myanmar (Burma)">Myanmar (Burma)
                        <OPTION VALUE="Namibia">Namibia
                        <OPTION VALUE="Naura">Naura
                        <OPTION VALUE="Nepal">Nepal
                        <OPTION VALUE="Netherlands">Netherlands
                        <OPTION VALUE="Netherlands Antilles">Netherlands Antilles
                        <OPTION VALUE="New Caledonia">New Caledonia
                        <OPTION VALUE="New Zealand">New Zealand
                        <OPTION VALUE="Nicaragua">Nicaragua
                        <OPTION VALUE="Niger">Niger
                        <OPTION VALUE="Nigeria">Nigeria
                        <OPTION VALUE="Niue">Niue
                        <OPTION VALUE="Norway">Norway
                        <OPTION VALUE="Oman">Oman
                        <OPTION VALUE="Pakistan">Pakistan
                        <OPTION VALUE="Panama">Panama
                        <OPTION VALUE="Papua New Guinea">Papua New Guinea
                        <OPTION VALUE="Paraguay">Paraguay
                        <OPTION VALUE="Peru">Peru
                        <OPTION VALUE="Philippines">Philippines
                        <OPTION VALUE="Pitcairn Island">Pitcairn Island
                        <OPTION VALUE="Poland">Poland
                        <OPTION VALUE="Portugal">Portugal
                        <OPTION VALUE="Qatar">Qatar
                        <OPTION VALUE="Republic of Korea">Republic of Korea
                        <OPTION VALUE="Reunion Island">Reunion Island
                        <OPTION VALUE="Romania">Romania
                        <OPTION VALUE="Russia">Russia
                        <OPTION VALUE="Rwanda">Rwanda
                        <OPTION VALUE="Saint Barthelemy">Saint Barthelemy
                        <OPTION VALUE="Saint Croix">Saint Croix
                        <OPTION VALUE="Saint Helena">Saint Helena
                        <OPTION VALUE="Saint Kitts and Nevis">Saint Kitts and Nevis
                        <OPTION VALUE="Saint Lucia">Saint Lucia
                        <OPTION VALUE="Saint Pierre and Miquelon">Saint Pierre and Miquelon
                        <OPTION VALUE="Saint Vincent and Grenadi">Saint Vincent and Grenadi
                        <OPTION VALUE="San Marino">San Marino
                        <OPTION VALUE="Sao Tome and Principe">Sao Tome and Principe
                        <OPTION VALUE="Saudi Arabia">Saudi Arabia
                        <OPTION VALUE="Senegal">Senegal
                        <OPTION VALUE="Seychelles">Seychelles
                        <OPTION VALUE="Sierra Leone">Sierra Leone
                        <OPTION VALUE="Singapore">Singapore
                        <OPTION VALUE="Slovakia">Slovakia
                        <OPTION VALUE="Slovenia">Slovenia
                        <OPTION VALUE="Solomon Islands">Solomon Islands
                        <OPTION VALUE="Somalia Northern Region">Somalia Northern Region
                        <OPTION VALUE="Somalia Southern Region">Somalia Southern Region
                        <OPTION VALUE="South Africa">South Africa
                        <OPTION VALUE="South Sandwich Islands">South Sandwich Islands
                        <OPTION VALUE="Spain">Spain
                        <OPTION VALUE="Sri Lanka">Sri Lanka
                        <OPTION VALUE="Sudan">Sudan
                        <OPTION VALUE="Suriname">Suriname
                        <OPTION VALUE="Swaziland">Swaziland
                        <OPTION VALUE="Sweden">Sweden
                        <OPTION VALUE="Switzerland">Switzerland
                        <OPTION VALUE="Syria">Syria
                        <OPTION VALUE="Taiwan">Taiwan
                        <OPTION VALUE="Tajikistan">Tajikistan
                        <OPTION VALUE="Tanzania">Tanzania
                        <OPTION VALUE="Thailand">Thailand
                        <OPTION VALUE="Togo">Togo
                        <OPTION VALUE="Tonga">Tonga
                        <OPTION VALUE="Trinidad and Tobago">Trinidad and Tobago
                        <OPTION VALUE="Tunisia">Tunisia
                        <OPTION VALUE="Turkey">Turkey
                        <OPTION VALUE="Turkmenistan">Turkmenistan
                        <OPTION VALUE="Turks and Caicos Islnd">Turks and Caicos Islnd
                        <OPTION VALUE="Tuvalu">Tuvalu
                        <OPTION VALUE="Uganda">Uganda
                        <OPTION VALUE="Ukraine">Ukraine
                        <OPTION VALUE="United Arab Emirates">United Arab Emirates
                        <OPTION VALUE="United Kingdom">United Kingdom
                        <OPTION VALUE="Uruguay">Uruguay
                        <OPTION VALUE="USA">USA
                        <OPTION VALUE="Uzbekistan">Uzbekistan
                        <OPTION VALUE="Vanuatu">Vanuatu
                        <OPTION VALUE="Vatican City">Vatican City
                        <OPTION VALUE="Venezuela">Venezuela
                        <OPTION VALUE="Vietnam">Vietnam
                        <OPTION VALUE="Virgin Islands (United Kingdom)">Virgin Islands (United Kingdom)
                        <OPTION VALUE="Wallis and Futuna Islands">Wallis and Futuna Islands
                        <OPTION VALUE="Western Sahara">Western Sahara
                        <OPTION VALUE="Western Samoa">Western Samoa
                        <OPTION VALUE="Yemen">Yemen
                        <OPTION VALUE="Zambia">Zambia
                        <OPTION VALUE="Zimbabwe (Rhodesia)">Zimbabwe (Rhodesia)         
        </select></TD>
        
 <TR>
                    <TD><font face="<% =DefaultFontFace %>" size=2>Firma de perfil</td>
                    <TD><font face="<% =DefaultFontFace %>" size=3>
                        <textarea name="sig" cols="30" rows=5><%=RS("M_sig") %></textarea></td>
</TR>
	<td colspan=2 align="center"><INPUT type="submit" value="Enviar"  name=submit1></td>
	
	</TABLE>
</FONT></TD>
</TR></TABLE>
<p>&nbsp;</P></FONT>