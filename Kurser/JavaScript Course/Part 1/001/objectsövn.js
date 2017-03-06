//-- 1 --

var car = {
    type: "saab",
    model: "9.5",
    color: "blue",
    hp: "200"
};

car.sedan = true;
console.log(car);

//-- 2 --

var arr = ["matches", "knife", "accelerant", "cedar wood", "stick", "tinder plug"];
var obj = {};
var i = 0;
for (i = 0; i < arr.length; i = i + 1) {
 obj[arr[i]] = 0;
}
console.log(obj);

//-- 3 --

var person = {
    name: "David",
    weight: 110,
    plus: 0.5,

    eatDoritos: function () {
    return this.weight + this.plus;
    }
};
console.log(person.eatDoritos());

//-- 4 --
var i;
var contact = [];


contact[0] = {
    name: "David",
    adress: "Bergsgatan 30",
    telephone: "0767050687",
    listItems: function () {
        console.log(contact[0].name + ", " + contact[0].adress + ", " + contact[0].telephone + ", ");
    }
};

contact[1] = {
    name: "Carlos",
    adress: "Helsinborg",
    telephone: "050000000",
    listItems: function () {
        console.log(contact[1].name + ", " + contact[1].adress + ", " + contact[1].telephone + ", ");
    }
};

contact[2] = {
    name: "Angelica",
    adress: "Malmö",
    telephone: "0111111111",
    listItems: function () {
        console.log(contact[2].name + ", " + contact[2].adress + ", " + contact[2].telephone + ", ");
    }
};

for (i = 0; i < 3; i = i + 1) {
    contact[i].listItems();
}

