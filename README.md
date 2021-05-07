# discord-public-flags
Retrieve information from Discord User's public_flags number.

<h1>Public Flags</h1>
<p>A Public Flag is an item (normally a number) that is used as a base way to determine other information</p>
<p>They are stored as a single value and can be used to obtain additional information</p>
<br>
<br>
<h2>How they work<h2>
<p>Discord uses an Int system for storing public flags</p>
<p>One value is twice the previous, this prevents overlap, but requires a sequential process for detemining values (highest to lowest)</p>
