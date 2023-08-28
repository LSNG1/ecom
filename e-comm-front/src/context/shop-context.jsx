import React, { createContext, useState } from 'react';
import { PRODUCTS } from '../products';

export const ShopContext = createContext(null);

const getDefaultCart = () => {
  let cart = {};
  for (let i = 0; i < PRODUCTS.length + 1; i++) {
    cart[i] = 0;
  }
  return cart;
};

export const ShopContextProvider = (props) => {
  const [cartItems, setCartItems] = useState(getDefaultCart());

  const addToCart = async (itemId) => {
    console.log("Adding to cart:", itemId);

    await fetch(`http://localhost:8000/api/user_carts/1`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/ld+json',
      },
      body: JSON.stringify({
        items: [...cartItems, itemId].filter(Boolean).join(','),
      }),
    });

    setCartItems((prev) => ({ ...prev, [itemId]: prev[itemId] + 1 }));
  };

  const removeFromCart = async (itemId) => {
  console.log("Removing from cart:", itemId);

  // Create a copy of cartItems object and update the item count
  const updatedCartItems = { ...cartItems };
  updatedCartItems[itemId] = Math.max(0, updatedCartItems[itemId] - 1);

  // Prepare the updated items string for API request
  const updatedItemsString = Object.keys(updatedCartItems)
    .map((key) => `${key},${'http://localhost:8000/api/gpus/' + key}`) // Convert object keys to comma-separated strings
    .filter((item) => updatedCartItems[item.split(',')[0]] > 0) // Filter out items with count 0

  // Update the cart items on the server
  await fetch(`http://localhost:8000/api/user_carts/1`, {
    method: 'PUT',
    headers: {
      'Content-Type': 'application/ld+json',
    },
    body: JSON.stringify({
      items: updatedItemsString.join(','),
    }),
  });

  // Update the local cart state
  setCartItems(updatedCartItems);
};
  const getTotalCartAmount = () => {
    let totalAmount = 0;
    for (const item in cartItems) {
      if (cartItems[item] > 0) {
        let itemInfo = PRODUCTS.find((product) => product.id === Number(item));
        totalAmount += cartItems[item] * itemInfo.price;
      }
    }
    return totalAmount;
  };

  const contextValue = {
    cartItems,
    addToCart,
    removeFromCart,
    getTotalCartAmount,
  };

  return (
    <ShopContext.Provider value={contextValue}>{props.children}</ShopContext.Provider>
  );
};
