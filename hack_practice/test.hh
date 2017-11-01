<?hh
	class test<T>{
		private T $value;
		public function __construct(T $v) {
			$this->value = $v;
		}

		public function disp(string $first){
			echo $first.$this -> value."\n";
		}
		public function chenge(T $word){
			$this -> value = $word;
		}

		public function checkNULL(?string $check){
			if($check !== null){
				echo "入力された値は". $check. "です。\n";
			}else{
				echo "NULLです。\n";
			}
		}
	}

	$test = new test("hello");
	$test -> disp("hello");
	$test -> chenge(1);
	$test -> disp("hello");
	$test -> checkNULL(null);
	$test -> checkNULL("sample");