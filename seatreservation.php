<!DOCTYPE html>
<html lang="pl">
<head >
<meta charset="utf-8">
<title>Page Title</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	
	const seats = new Array();
	var ele = document.getElementsByClassName("seat");

	
	function removeItemOnce(arr, value) {
		 var index = arr.indexOf(value);
			arr.splice(index, 1);
		  return arr;
	}
	
	function uniq(a) {
		return a.sort().filter(
			function(item, pos, ary) {
				return !pos || item != ary[pos - 1];
			}	
		);
	}
		
	$(".seat").click(function(){
		var reserve = $( this ).html(  );
		if($(this).css("background-color")=="rgb(220, 20, 60)"){
			removeItemOnce(seats,reserve);
			$( this ).css("background-color","white");
			document.getElementById("test").innerHTML = uniq(seats);
			$('#array').val(uniq(seats));
		}else{
			seats.push(reserve);	
			$( this ).css("background-color","Crimson");
			document.getElementById("test").innerHTML = uniq(seats);
			$('#array').val(uniq(seats));
		}
	});
});
</script>


</head>
<body>

<div id="test">czekam</div><br>

<div class="hallView">

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seat">1</div>

<div class="seat">2</div>
<div class="seat">3</div>
<div class="seat">4</div>
<div class="seat">5</div>
<div class="seat">6</div>
<div class="seat">7</div>
<div class="seat">8</div>
<div class="seat">9</div>
<div class="seat">10</div>
<div class="seat">11</div>
<div class="seat">12</div>
<div class="seat">13</div>
<div class="seat">14</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">15</div>
<div class="seat">16</div>
<div class="seat">17</div>
<div class="seat">18</div>
<div class="seat">19</div>
<div class="seat">20</div>
<div class="seat">21</div>
<div class="seat">22</div>
<div class="seat">23</div>
<div class="seat">24</div>
<div class="seat">25</div>
<div class="seat">26</div>
<div class="seat">27</div>
<div class="seat">28</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">29</div>
<div class="seat">30</div>
<div class="seat">31</div>
<div class="seat">32</div>
<div class="seat">33</div>
<div class="seat">34</div>
<div class="seat">35</div>
<div class="seat">36</div>
<div class="seat">37</div>
<div class="seat">38</div>
<div class="seat">39</div>
<div class="seat">40</div>
<div class="seat">41</div>
<div class="seat">42</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">43</div>
<div class="seat">44</div>
<div class="seat">45</div>
<div class="seat">46</div>
<div class="seat">47</div>
<div class="seat">48</div>
<div class="seat">49</div>
<div class="seat">50</div>
<div class="seat">51</div>
<div class="seat">52</div>
<div class="seat">53</div>
<div class="seat">54</div>
<div class="seat">55</div>
<div class="seat">56</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">57</div>
<div class="seat">58</div>
<div class="seat">59</div>
<div class="seat">60</div>
<div class="seat">61</div>
<div class="seat">62</div>
<div class="seat">63</div>
<div class="seat">64</div>
<div class="seat">65</div>
<div class="seat">66</div>
<div class="seat">67</div>
<div class="seat">68</div>
<div class="seat">69</div>
<div class="seat">70</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">71</div>
<div class="seat">72</div>
<div class="seat">73</div>
<div class="seat">74</div>
<div class="seat">75</div>
<div class="seat">76</div>
<div class="seat">77</div>
<div class="seat">78</div>
<div class="seat">79</div>
<div class="seat">80</div>
<div class="seat">81</div>
<div class="seat">82</div>
<div class="seat">83</div>
<div class="seat">84</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">85</div>
<div class="seat">86</div>
<div class="seat">87</div>
<div class="seat">88</div>
<div class="seat">89</div>
<div class="seat">90</div>
<div class="seat">91</div>
<div class="seat">92</div>
<div class="seat">93</div>
<div class="seat">94</div>
<div class="seat">95</div>
<div class="seat">96</div>
<div class="seat">97</div>
<div class="seat">98</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">99</div>
<div class="seat">100</div>
<div class="seat">101</div>
<div class="seat">102</div>
<div class="seat">103</div>
<div class="seat">104</div>
<div class="seat">105</div>
<div class="seat">106</div>
<div class="seat">107</div>
<div class="seat">108</div>
<div class="seat">109</div>
<div class="seat">110</div>
<div class="seat">111</div>
<div class="seat">112</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">113</div>
<div class="seat">114</div>
<div class="seat">115</div>
<div class="seat">116</div>
<div class="seat">117</div>
<div class="seat">118</div>
<div class="seat">119</div>
<div class="seat">120</div>
<div class="seat">121</div>
<div class="seat">122</div>
<div class="seat">123</div>
<div class="seat">124</div>
<div class="seat">125</div>
<div class="seat">126</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">127</div>
<div class="seat">128</div>
<div class="seat">129</div>
<div class="seat">130</div>
<div class="seat">131</div>
<div class="seat">132</div>
<div class="seat">133</div>
<div class="seat">134</div>
<div class="seat">135</div>
<div class="seat">136</div>
<div class="seat">137</div>
<div class="seat">138</div>
<div class="seat">139</div>
<div class="seat">140</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">141</div>
<div class="seat">142</div>
<div class="seat">143</div>
<div class="seat">144</div>

<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">145</div>
<div class="seat">146</div>
<div class="seat">147</div>
<div class="seat">148</div>
<div class="seat">149</div>
<div class="seat">150</div>
<div class="seat">151</div>
<div class="seat">152</div>
<div class="seat">153</div>
<div class="seat">154</div>
<div class="seat">155</div>
<div class="seat">156</div>
<div class="seat">157</div>
<div class="seat">158</div>
<div class="seatfiller"></div>
<div class="seatfiller"></div>
<div class="seat">159</div>
<div class="seat">160</div>
<div class="seat">161</div>
<div class="seat">162</div>

<div class="seat">163</div>
<div class="seat">164</div>
<div class="seat">165</div>
<div class="seat">166</div>
<div class="seat">167</div>
<div class="seat">168</div>
<div class="seat">169</div>
<div class="seat">170</div>
<div class="seat">171</div>
<div class="seat">172</div>
<div class="seat">173</div>
<div class="seat">174</div>
<div class="seat">175</div>
<div class="seat">176</div>
<div class="seat">177</div>
<div class="seat">178</div>
<div class="seat">179</div>
<div class="seat">180</div>
<div class="seat">181</div>
<div class="seat">182</div>
<div class="seat">183</div>
<div class="seat">184</div>
<div class="seat">185</div>

</div>

<form>
<input type="hidden" value ="1" name="array" id="array">
</form>


</body>
</html>