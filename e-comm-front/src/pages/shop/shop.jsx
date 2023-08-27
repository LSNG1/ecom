import React from 'react';
import { PRODUCTS } from '../../products';
import { Product } from './product';
// import useState from "react";
import { useState, useEffect } from 'react'
import './shop.css';
import SwipeableTextMobileStepper from '../../components/Carousel/carousel'
export const Shop  =  () => {
  const [ data, setData ] = useState([]);
  const [ IsUser, setIsUser ] = useState([]);
  const [ array, setArray ] = useState([]);
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

  // useEffect(()=>{
  //   console.table("yoyo", data[0]?.name)
    
  // },[data])

  async function addToCart1(id){

    // http://localhost:8000/api/user_carts
    let utm = `http://localhost:8000/api/gpus/${id}`
    let user = `http://localhost:8000/api/user_carts/1`
    // setState((prevState) => ({ ...prevState, value1: "new 1" }));
    setArray((prevState)  => ({...prevState, utm}))
    await fetch(user, {
    headers: {
        'accept': 'application/ld+json'
    }
});

  await fetch("http://localhost:8000/api/user_carts/1").then((response) => {
    if (!response.ok) {
        console.log(response.statusText);
    }
    return response.json();
  })
  .then(json => {
  console.log("oehid" ,json.items)
  if(json.items){
    setIsUser(json.items)
    // console.table(json)

  }  

    console.log("notNull" , IsUser)
  let bigdata= IsUser + "," + utm
      fetch("http://localhost:8000/api/user_carts/1", {
      method: 'PUT',
      headers: {
          'accept': 'application/ld+json',
          'Content-Type': 'application/ld+json'
      },
      body: `{"items": "${bigdata}"}`
  });
    
  // }
  
  }) //setData here
  }

  return (
    <div className='shop'>
    <button>Dick’s Fapper</button>
      <div className='Carousel'>
        <SwipeableTextMobileStepper />
      </div>
      <div className='shopTitle'>
        <h1>Welcome Page</h1>
      </div>
      <div className='products'>
        {data.map((article) => (
         <div className='product'>
         {/* <img src={productImage} alt={productName}/> */}
         <div className='description'>
             <p><b>{article.name}</b></p>
             <p>{article.price}</p>
         </div>
         <button className='addToCartBttn' onClick={() => addToCart1(article.id)}> Add To Cart  </button>
         </div>
        ))}
      </div>
    </div>
  );
};