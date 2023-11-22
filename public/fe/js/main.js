let amountElement = document.getElementById('amount');


// console.log(amount);
let render = (amount) => {
    amountElement.value = amount
}
//Handle Plus
let handlePlus = () => {
    // console.log(amount);
    amount++;
    render(amount);
}

//Handle Minus
let handleMinus = () => {
    if (amount > 1) {
        amount--

    }
    else {
        amount = 1;
    }
    render(amount);
}