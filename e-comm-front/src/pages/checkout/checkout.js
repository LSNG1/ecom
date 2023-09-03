import React, { useState, useEffect } from "react";
import {
	Elements,
	CardElement,
	useStripe,
	useElements,
} from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";
import { useLocation } from "react-router-dom";

const stripePromise = loadStripe(
	"pk_test_51NmGJyCDe7oVF85pCbcQNcB20YiCatJCjVhAJpGWDPwfcs3faO9KmKxrcN0GMtvtFajT4yXC2nG0QeUc1CW0RIji001ZzssJFN"
);

const Checkout = () => {
	const [paymentError, setPaymentError] = useState(null);
	const [isLoading, setIsLoading] = useState(false);
	const location = useLocation();
	const cartItems = JSON.parse(
		new URLSearchParams(location.search).get("cart")
	);
	console.log("Cart items:", cartItems);
	const stripe = useStripe();
	const elements = useElements();

	useEffect(() => {
		if (stripePromise) {
			stripePromise.then((stripeInstance) => {
				console.log("Stripe instance:", stripeInstance);
			});
		}
	}, []);

	const handlePayment = async (clientSecret, cardElement) => {
		setIsLoading(true);

		try {
			if (!cardElement) {
				throw new Error("Invalid payment details");
			}

			const { paymentMethod, error } = await stripe.confirmCardPayment(
				clientSecret,
				{
					payment_method: {
						card: cardElement,
					},
				}
			);

			if (error) {
				console.error("Payment error:", error);
				setPaymentError(`Payment failed: ${error.message}`);
			} else {
				console.log("Payment successful:", paymentMethod);
				setPaymentError(null);

				const confirmPaymentResponse = await fetch(
					"http://localhost:8000/api/confirm-payment",
					{
						method: "POST",
						headers: {
							"Content-Type": "application/json",
						},
						body: JSON.stringify({
							paymentIntentId: paymentMethod.payment_intent,
							paymentDetails: {},
						}),
					}
				);

				if (confirmPaymentResponse.ok) {
					alert("Payment confirmed successfully!");
				} else {
					alert("Payment confirmation failed.");
				}
			}
		} catch (error) {
			console.error("Payment error:", error);
			setPaymentError("Payment confirmed successfully");
		} finally {
			setIsLoading(false);
		}
	};

	const createPaymentIntent = async () => {
		try {
			const response = await fetch("http://localhost:8000/api/create-payment-intent", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
				},
				body: JSON.stringify({
					cartItems: cartItems, //
				}),
			});

			if (!response.ok) {
				throw new Error(`HTTP error! Status: ${response.status}`);
			}

			const data = await response.json();
			console.log("Payment intent data:", data);
			return data.clientSecret;
		} catch (error) {
			console.error("Payment intent error:", error);
			setPaymentError(
				`An error occurred while creating the payment intent: ${error.message}`
			);
		}
	};

	const handleSubmit = async (e) => {
		e.preventDefault();
		const cardElement = elements.getElement(CardElement);
		if (cardElement) {
			const clientSecret = await createPaymentIntent();
			handlePayment(clientSecret, cardElement);
		} else {
			console.error("CardElement is not available");
		}
	};
	return (
		<div>
			<h2>Checkout</h2>
			<div>
				<h3>Cart Items:</h3>
				<ul>
					{cartItems.map((item) => (
						<li key={item.id}>
							{item.name} - ${item.price}
						</li>
					))}
				</ul>
			</div>
			<form onSubmit={handleSubmit}>
				<CardElement />
				<button type="submit" disabled={isLoading}>
					{isLoading ? "Processing..." : "Pay"}
				</button>
			</form>
			{paymentError && <p style={{ color: "red" }}>{paymentError}</p>}
		</div>
	);
};

export default Checkout;
