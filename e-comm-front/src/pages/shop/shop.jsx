import React, { useState, useEffect } from "react";
import SwipeableTextMobileStepper from "../../components/carousel";
import "./shop.css";

export const Shop = () => {
	const [data, setData] = useState([]);
	const [currentPage, setCurrentPage] = useState(1);
	const [totalPages, setTotalPages] = useState(1);
	const [IsUser, setIsUser] = useState([]);
	const [array, setArray] = useState({});

	useEffect(() => {
		const fetchData = async () => {
			try {
				const response = await fetch(
					`http://localhost:8000/api/gpus?page=${currentPage}`,
					{
						headers: {
							accept: "application/ld+json",
						},
					}
				);
				if (!response.ok) {
					throw new Error("Network response was not ok");
				}
				const json = await response.json();
				setData(json["hydra:member"]);
				setTotalPages(json["hydra:view"]["hydra:last"].split("=")[1]);
			} catch (error) {
				console.error("Error fetching data:", error);
			}
		};

		fetchData();
	}, [currentPage]);

	async function addToCart1(id) {
		const utm = `http://localhost:8000/api/gpus/${id}`;
		const user = `http://localhost:8000/api/user_carts/1`;
		setArray((prevState) => ({ ...prevState, utm }));

		try {
			await fetch(user, {
				headers: {
					accept: "application/ld+json",
				},
			});

			const response = await fetch("http://localhost:8000/api/user_carts/1");
			if (!response.ok) {
				throw new Error("Network response was not ok");
			}
			const json = await response.json();
			if (json.items) {
				setIsUser(json.items);
			}

			const bigdata = IsUser + "," + utm;
			await fetch("http://localhost:8000/api/user_carts/1", {
				method: "PUT",
				headers: {
					accept: "application/ld+json",
					"Content-Type": "application/ld+json",
				},
				body: `{"items": "${bigdata}"}`,
			});
		} catch (error) {
			console.error("Error in addToCart1:", error);
		}
	}

	const renderPagination = () => {
		const pages = [];
		for (let i = 1; i <= totalPages; i++) {
			pages.push(
				<button
					key={i}
					className={`${i === currentPage ? "bg-blue-500" : "bg-gray-300"
						} hover:bg-blue-700 text-white font-bold py-2 px-4 rounded`}
					onClick={() => setCurrentPage(i)}
				>
					{i}
				</button>
			);
		}
		return pages;
	};

	return (
		<div className="shop">
			<button>Dick’s Fapper</button>
			<div className="Carousel">
				<SwipeableTextMobileStepper />
			</div>
			<div className="shopTitle">
				<h1>Welcome Page</h1>
			</div>
			<div className="products">
				{data.map((article) => (
					<div className="product" key={article.id}>
						<div className="description">
							<p>
								<b>{article.name}</b>
							</p>
							<p>{article.price}</p>
						</div>
						<button
							className="addToCartBtn"
							onClick={() => addToCart1(article.id)}
						>
							Add To Cart
						</button>
					</div>
				))}
			</div>
			<div className="pagination">{renderPagination()}</div>
		</div>
	);
};
