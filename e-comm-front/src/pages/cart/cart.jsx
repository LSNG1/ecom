import React, { useContext } from 'react';
import { PRODUCTS } from '../../products';
import { ShopContext } from '../../context/shop-context';
import { CartItem } from './cart-item';
import { useNavigate } from "react-router-dom";
import { useState, useEffect } from 'react';
import "./cart.css";
export const Cart = () => {
const { cartItems, getTotalCartAmount } = useContext(ShopContext);
// const totalAmount = getTotalCartAmount();
const navigate = useNavigate();
const [ data, setData ] = useState([]);
const [ price, setPrice ] = useState([]);
const [ total, setTotal ] = useState(0);
const [ name, setName ] = useState(0);
const [ chipset, setChipset ] = useState(0);




useEffect(() => {
    fetch('http://localhost:8000/api/user_carts/1', {
      headers: {
        'accept': 'application/ld+json'
      }
    })
      .then((response) => {
        if (!response.ok) {
          console.log(response.statusText);
        }
        return response.json();
      })
      .then(json => {
        console.log("oehid", json.items);
        let dataStr = JSON.stringify(json.items);
        let count = dataStr.length;
        let u = dataStr.substr(2, count - 3);
        var dataArray = u.split(",");
        
        Promise.all(dataArray.map(url =>
          fetch(url)
            .then(response => {
              if (!response.ok) {
                console.log(response.statusText);
              }
              setTotal(1)
              return response.json();
            })
        ))
        .then(dataArray => {
          const fetchedData = dataArray.map(json => json.chipset + "," + json.name + "," + json.price);
    setData(fetchedData);

    const prices = fetchedData.map(product => {
      const arraydata = product.split(",");
      return parseFloat(arraydata[2]);
    });

    const name = fetchedData.map(product => {
      const arraydata = product.split(",");
      return arraydata[1];
    });

    const chipset = fetchedData.map(product => {
      const arraydata = product.split(",");
      return arraydata[0];
    });

    const totalPrice = prices.reduce((total, price) => total + price, 0);
    setTotal(totalPrice);
    setPrice(prices); 
    setName(name)
    setChipset(chipset)

  })
        .catch((error) => {
          console.log(error.message);
        });
      })
      .catch((error) => {
        console.log(error.message);
      });

  }, []);

  console.log("console log :", data);
  console.log(price)

  // const all = [
  //   {

  //     "name":name
  //   },
  //   {

  //     "price": price
  //   }
  // ]

  const all = name.map((productName, index) => ({
    name: productName,
    price: price[index],
    chipset: chipset[index]
  }));
  console.log(all)



  return (
    <div className='cart'>
      <div>
        <h1>Your Cart</h1>
      </div>
      <div className='cartItems'>
        {all.map((product, index) =>  (
          <>
          <p key={index}>item: {product.name}</p>
          <p key={index}>chipset: {product.chipset}</p>
          <p key={index}>price: {product.price}</p>
          </>
         
        ))}
       
         
      </div>
      {total > 0 ? (
        <div className='checkout'>
          <p>Subtotal: ${total}</p>
          <button onClick={() => navigate("/")}> Continue Shopping </button>
          <button> Checkout </button>
        </div>
      ) : (
        <h1> Your Cart is Empty </h1>
      )}
    </div>
  )
  
}