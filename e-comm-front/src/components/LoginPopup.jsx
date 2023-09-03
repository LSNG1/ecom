import React from "react";
import { useNavigate } from "react-router-dom";

const LoginPopup = ({ onLogin, onCancel, fetchedCartItems }) => {
	const navigate = useNavigate();

	const handleLogin = () => {
		onLogin();
		navigate("/login");
	};

	const handleContinueAsGuest = () => {
		onCancel();
		navigate(`/Checkout?cart=${JSON.stringify(fetchedCartItems)}`);
	};

	return (
		<div className="popup">
			<p>Do you want to log in or continue as a guest?</p>
			<button onClick={handleLogin}>Log In</button>
			<button onClick={handleContinueAsGuest}>Continue as Guest</button>
		</div>
	);
};

export default LoginPopup;
