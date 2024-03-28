let iconCart = document.querySelector('.cart');
let closeCart = document.querySelector('.close')
let body = document.querySelector('body');
let listproductHTML = document.querySelector('.list_product');
let listCartHTML = document.querySelector('.list_cart');
let iconCartspan = document.querySelector('.icons span')

let listproducts = [];
let carts = [];

iconCart.addEventListener('click', () => {
    body.classList.toggle('showcart')
})

closeCart.addEventListener('click', () => {
    body.classList.toggle('showcart')
})

const addDataToHTML = () => {
    listproductHTML.innerHTML = '';
    if (listproducts.length > 0) {
        listproducts.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.dataset.id = product.id;
            newProduct.innerHTML = `
            <img src="${product.image}" alt="skin photo">
            <h2>${product.name}</h2>
            <div class="price">₨ ${product.price}</div>
            <div class="addcart">Add to Cart</div>
        `;
            listproductHTML.appendChild(newProduct)
        })
    }
}
listproductHTML.addEventListener('click', (Event) => {
    let positionClick = Event.target;
    if (positionClick.classList.contains('addcart')) {
        let product_id = positionClick.parentElement.dataset.id;
        addToCart(product_id);
    }
})

const addToCart = (product_id) => {
    let positionThisProductInCart = carts.findIndex((value) => value.product_id == product_id);
    if (carts.length <= 0) {
        carts = [{
            product_id: product_id,
            quantity: 1
        }]
    } else if (positionThisProductInCart < 0) {
        carts.push({
            product_id: product_id,
            quantity: 1
        });
    } else {
        carts[positionThisProductInCart].quantity = carts[positionThisProductInCart].quantity + 1;
    }
    addCartToHTML();
    addCartToMemory();
}

const addCartToMemory = () => {
    localStorage.setItem('cart', JSON.stringify(carts));
}

const addCartToHTML = () => {
    listCartHTML.innerHTML = '';
    let totalQuantity = 0;
    if (carts.length > 0) {
        carts.forEach(cart => {
            totalQuantity = totalQuantity + cart.quantity;
            let newCart = document.createElement('div');
            newCart.classList.add('item');
            newCart.dataset.id = cart.product_id;
            let positionProduct = listproducts.findIndex((value) => value.id == cart.product_id);
            let info = listproducts[positionProduct];
            newCart.innerHTML = `
            <div class="image">
                    <img src="${info.image}">
                </div>
                <div class="name">
                ${info.name}
                </div>
                <div class="total_price">
                    ₹${info.price * cart.quantity}
                </div>
                <div class="quantity">
                    <span class="minus"><</span>
                            <span>${cart.quantity}</span>
                            <span class="plus">></span>
                </div>
            `;
        listCartHTML.appendChild(newCart);
        })
    }
    iconCartspan.innerText = totalQuantity;
}

listCartHTML.addEventListener('click', (Event) => {
    let positionClick = Event.target;
    if(positionClick.classList.contains('minus') || positionClick.classList.contains('plus')){
        let product_id = positionClick.parentElement.parentElement.dataset.id;
        let type = 'minus';
        if(positionClick.classList.contains('plus')){
            type = 'plus';
        }
        changeQuantity(product_id, type);
    }
})
const changeQuantity = (product_id, type) => {
    let positionItemInCart = carts.findIndex((value) => value.product_id == product_id);
    if(positionItemInCart >= 0){
        switch (type) {
            case 'plus':
                carts[positionItemInCart].quantity = carts[positionItemInCart].quantity + 1;
                break;
            default:
                let valueChange = carts[positionItemInCart].quantity - 1;
                if(valueChange > 0){
                    carts[positionItemInCart].quantity = valueChange;
                }else{
                    carts.splice(positionItemInCart, 1);
                }
                break;
        }
    }
    addCartToMemory();
    addCartToHTML();
}
const initApp = () => {
    fetch('data.json')
        .then(response => response.json())
        .then(data => {
            listproducts = data;
            addDataToHTML();

            if(localStorage.getItem('cart')){
                carts = JSON.parse(localStorage.getItem('cart'));
                addCartToHTML();
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
};

initApp();
