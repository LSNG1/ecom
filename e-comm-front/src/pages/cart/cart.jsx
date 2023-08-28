import React, { useContext, useState, useEffect } from "react";
import { ShopContext } from "../../context/shop-context";
import { useNavigate } from "react-router-dom";

export const Cart = () => {
  const { cartItems, addToCart, removeFromCart } = useContext(ShopContext);
  const navigate = useNavigate();

  const [cartData, setCartData] = useState([]);
  const [totalPrice, setTotalPrice] = useState(0);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch("http://localhost:8000/api/user_carts/1", {
          headers: {
            accept: "application/ld+json",
          },
        });

        if (!response.ok) {
          throw new Error(response.statusText);
        }

        const jsonData = await response.json();

        if (!jsonData || !jsonData.items) {
          throw new Error("Invalid response format");
        }

        const itemUrls = jsonData.items.split(",").filter(Boolean);

        const responses = await Promise.all(itemUrls.map((url) => fetch(url)));
        const jsonResponses = await Promise.all(
          responses.map((res) => res.json())
        );

        const cartItems = jsonResponses.map((json) => ({
          chipset: json.chipset,
          name: json.name,
          price: json.price,
        }));

        setCartData(cartItems);

        const totalPrice = cartItems.reduce(
          (total, product) => total + product.price,
          0
        );
        setTotalPrice(totalPrice);
      } catch (error) {
        setError(error.message);
        console.error("Error fetching data:", error.message);
      }
    };

    fetchData();
  }, []);

  if (error) {
    return <div className="cart">Error fetching data: {error}</div>;
  }

  return (
    <div className="p-4 bg-white rounded-lg shadow-md">
      <h1 className="text-2xl font-semibold mb-4">Your Cart</h1>
      <div className="space-y-4">
        {cartData.map((product, index) => (
          <div className="p-4 border rounded-lg shadow-md flex flex-col items-center">
            <p className="font-semibold">{product.name}</p>
            <p>Chipset: {product.chipset}</p>
            <p>Price: ${product.price}</p>
            <div className="flex space-x-4 mt-2">
              <button
                className="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded"
                onClick={() => addToCart(product.itemId)}
              >
                Add to Cart
              </button>
              <button
                className="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded"
                onClick={() => removeFromCart(product.itemId)}
              >
                Remove from Cart
              </button>
            </div>
          </div>
        ))}
      </div>
      {totalPrice > 0 ? (
      <div className="mt-4">
        <p className="font-semibold">Subtotal: ${totalPrice}</p>
        <div className="flex flex-col items-center mt-2"> {/* Added flex-col and items-center */}
          <button
            className="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
            onClick={() => navigate("/")}
          >
            Continue Shopping
          </button>
          <button className="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-2">
            Checkout
          </button>
        </div>
      </div>
    ) : (
      <h1 className="text-2xl font-semibold mt-4">Your Cart is Empty</h1>
    )}
    </div>
  );
};
