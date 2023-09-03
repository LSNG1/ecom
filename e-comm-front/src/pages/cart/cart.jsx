import React, { useContext, useState, useEffect } from "react";
import { ShopContext } from "../../context/shop-context";
import { useNavigate } from "react-router-dom";
import LoginPopup from "../../components/LoginPopup";

export const Cart = () => {
	const isAuthenticated = !!localStorage.getItem("token");
	const { cartItems, addToCart, removeFromCart } = useContext(ShopContext);
	const navigate = useNavigate();
	const [totalPrice, setTotalPrice] = useState(0);
	const [fetchedCartItems, setFetchedCartItems] = useState([]);
	console.log(cartItems);
	const [showLoginPopup, setShowLoginPopup] = useState(false);

	const handleShowLoginPopup = () => {
		setShowLoginPopup(true);
	};

	const handleHideLoginPopup = () => {
		setShowLoginPopup(false);
	};

	useEffect(() => {
		async function fetchData(url) {
			try {
				const response = await fetch(url);
				if (!response.ok) {
					throw new Error(`HTTP error! Status: ${response.status}`);
				}
				const data = await response.json();
				return data;
			} catch (error) {
				console.error("Error fetching data:", error);
				return null;
			}
		}

		async function fetchAllData() {
			const promises = cartItems.map((url) => fetchData(url));
			const results = await Promise.all(promises);
			const validResults = results.filter((result) => result !== null);
			setFetchedCartItems(validResults);
			console.log(validResults);
		}

		if (cartItems.length > 0) {
			fetchAllData();
		}
	}, [cartItems]);

	useEffect(() => {
		let total = 0;
		fetchedCartItems.forEach((product) => {
			total += product.price;
		});
		setTotalPrice(total);
	}, [fetchedCartItems]);

	return (
		<div className="p-4 bg-white rounded-lg shadow-md">
			<h1 className="text-2xl font-semibold mb-4">Your Cart</h1>
			{fetchedCartItems.length > 0 ? (
				<div className="space-y-4">
					{fetchedCartItems.map((product, index) => (
						<div
							key={product.id}
							className="p-4 border rounded-lg shadow-md flex flex-col items-center"
						>
							<p className="font-semibold">{product.name}</p>
							<p>Chipset: {product.chipset}</p>
							<p>Price: ${product.price}</p>
							<div className="flex space-x-4 mt-2">
								<button
									className="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded"
									onClick={() => addToCart(product.id)}
								>
									Add to Cart
								</button>
								<button
									className="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded"
									onClick={() => removeFromCart(product.id)}
								>
									Remove from Cart
								</button>
							</div>
						</div>
					))}
				</div>
			) : (
				<h1 className="text-2xl font-semibold mt-4">Your Cart is Empty</h1>
			)}
			{totalPrice > 0 ? (
				<div className="mt-4">
					<p className="font-semibold">Subtotal: ${totalPrice}</p>
					<div className="flex flex-col items-center mt-2">
						{isAuthenticated ? (
							<button
								className="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded"
								onClick={() => {
									navigate(`/Checkout?cart=${JSON.stringify(fetchedCartItems)}`);
								}}
							>
								Checkout
							</button>
						) : (
							<button
								className="bg-blue-500 hover:bg-blue-600 text-white px-2 py-1 rounded"
								onClick={handleShowLoginPopup}
							>
								Login to Checkout
							</button>
						)}
						{showLoginPopup && (
							<LoginPopup
								onLogin={handleHideLoginPopup}
								onCancel={handleHideLoginPopup}
								fetchedCartItems={fetchedCartItems}
							/>
						)}
					</div>
				</div>
			) : null}
		</div>
	);
};
