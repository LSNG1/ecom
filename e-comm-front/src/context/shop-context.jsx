import React, { createContext, useState, useEffect } from 'react';
import PropTypes from 'prop-types';

export const ShopContext = createContext(null);

export const ShopContextProvider = ({ children }) => {
	const [cartItems, setCartItems] = useState([]);

	useEffect(() => {
		const storedCartItems = localStorage.getItem('cartItems');
		if (storedCartItems) {
			setCartItems(JSON.parse(storedCartItems));
		}
	}, []);

	const addToCart = (itemId) => {
		const item = `http://localhost:8000/api/gpus/${itemId}`;
		setCartItems((prevCartItems) => {
			const updatedCart = [...prevCartItems, item];
			localStorage.setItem('cartItems', JSON.stringify(updatedCart));
			return updatedCart;
		});
	};

	const removeFromCart = (itemId) => {
		console.log(itemId);
		const itemToRemove = `http://localhost:8000/api/gpus/${itemId}`;
		setCartItems((prevCartItems) => {
			const updatedCart = prevCartItems.filter((cartItem) => cartItem !== itemToRemove);
			localStorage.setItem('cartItems', JSON.stringify(updatedCart));
			console.log(updatedCart);
			return updatedCart;
		});
	};

	const contextValue = {
		cartItems,
		addToCart,
		removeFromCart,
	};

	return (
		<ShopContext.Provider value={contextValue}>{children}</ShopContext.Provider>
	);
};

ShopContextProvider.propTypes = {
	children: PropTypes.node.isRequired,
};
