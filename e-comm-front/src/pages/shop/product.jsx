import React, { useContext } from 'react';
import { Link } from 'react-router-dom';
import { ShopContext } from '../../context/shop-context';
import { useState, useEffect } from 'react'
import './product.css';

export const Product = (props) => {
    const {id, productName, price, productImage} = props.data;
    const { addToCart, cartItems } = useContext(ShopContext);
    const cartItemAmount = cartItems[id];

    function addToCart1(){
      // http://localhost:8000/api/user_carts

      fetch('http://localhost:8000/api/user_carts', {
    method: 'POST',
    headers: {
        'accept': 'application/ld+json',
        'Content-Type': 'application/ld+json'
    },
    body: '{\n  "idUser": 1,\n  "items": [\n    "test1",\n    "test2"\n  ]\n}'
});
    }

    const [ data, setData ] = useState([]);
    useEffect(()=>{
      fetch('http://localhost:8000/api/gpus?page=1', {
              headers: {
                'accept': 'application/ld+json'
            }
        }).then((response) => {
          if (!response.ok) {
              console.log(response.statusText);
          }
          return response.json();
        })
        .then(json => {
        console.log("oehid" ,json['hydra:member'])  
          setData(json['hydra:member'])
        }) //setData here
        .catch((error) => {
          console.log(error.message);
        })
    },[])
  
    useEffect(()=>{
      console.table(data)
      console.log(
        '%c Hello, Everyone!',
        'padding: 15px; background-color: #2ecc71; color: black'
      );
    },[data])
  return (
    <>
    {data.map(() => (
      <div className='product'>
        <img src={productImage} alt={productName}/>
        <div className='description'>
            <p><b>{data.name}</b></p>
            <p>${price}</p>
        </div>
        <button className='addToCartBttn' onClick={() => addToCart(id)}> Add To Cart {cartItemAmount > 0 && <> ({cartItemAmount})</>} </button>
        </div>
    ))}
    
    </>
  )
}