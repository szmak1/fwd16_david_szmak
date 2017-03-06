//-- 4 --
myCardnumber = prompt("enter number");
 
var myString = 'set of 12 worth between $123.00 and $45,678';
var regex = '\$([0-9,]+)(?:\.(\d\d))?';

for(var match, r=RegExp(regex,'g'); match=regex.exec(myString) && match!==null; )
    console.log(match);
