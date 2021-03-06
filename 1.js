console.log(palindrome(1001));

function palindrome(input){
    var rem, final = 0;

    var temp = input;
    while(input>0){
        rem = input%10;
		input = parseInt(input/10);
		final = final*10+rem;
	}
	if(final==temp){
		console.log(temp + " merupakan bilangan palindrome");
	}else{
        console.log(temp + " bukan bilangana palindrome");
	}
}

