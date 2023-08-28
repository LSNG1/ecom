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
    console.log("Fetching data...");
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
        console.log("Data fetched:", jsonData);

        if (!jsonData || !jsonData.items) {
          setCartData([]); // Set an empty array to indicate no items in the cart
        } else {
          const itemUrls = jsonData.items.split(",").filter(Boolean);
          const responses = await Promise.all(itemUrls.map((url) => fetch(url)));
          const jsonResponses = await Promise.all(
            responses.map((res) => res.json())
          );
          console.log("JSON responses:", jsonResponses);
          const cartItems = jsonResponses.map((json) => ({
            itemId: json.id,
            chipset: json.chipset,
            name: json.name,
            price: json.price,
          }));
          console.log("Cart items:", cartItems);
          setCartData(cartItems);

          const totalPrice = cartItems.reduce(
            (total, product) => total + product.price,
            0
          );
          setTotalPrice(totalPrice);
        }
      } catch (error) {
        setError(error.message);
        // console.error("Error fetching data:", error.message);
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
      {cartData.length > 0 ? (
        <div className="space-y-4">
          {cartData.map((product, index) => (
            <div
              key={product.itemId}
              className="p-4 border rounded-lg shadow-md flex flex-col items-center"
            >
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
      ) : (
        <h1 className="text-2xl font-semibold mt-4">Your Cart is Empty</h1>
      )}
      {totalPrice > 0 ? (
        <div className="mt-4">
          <p className="font-semibold">Subtotal: ${totalPrice}</p>
          <div className="flex flex-col items-center mt-2">
            {/* ... rest of the code ... */}
          </div>
        </div>
      ) : null}
    </div>
  );
};
