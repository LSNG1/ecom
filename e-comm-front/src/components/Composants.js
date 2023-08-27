import React, { useState, useEffect } from "react";
import axios from "axios";
// import { search } from 'core-js/fn/symbol';

export default function Composants() {
  const [data, setData] = useState([]);
  const [choix, setChoix] = useState(0);
  const [url, setUrl] = useState("");
  const [message, setMessage] = useState("");
  const [categorie, setCategorie] = useState("");

  const handleChange = (event) => {
    setMessage(event.target.value);

    console.log("value is:", event.target.value);
  };

  useEffect(() => {
    fetchInfo();
  }, [url]);

  const gpu = () => {
    setChoix("gpus");
    // setUrl('http://localhost:8000/api/gpus?page=1&name=');
    setUrl("https://127.0.0.1:8000/api/gpus?page=1&name=");
    setCategorie("gpu");

    console.log("gpu");
  };

  const cpu = () => {
    setChoix("cpus");
    // setUrl('http://localhost:8000/api/cpus?page=1&name=');
    setUrl("https://127.0.0.1:8000/api/cpus?page=1&name=");

    console.log("cpu");
  };

  const fetchInfo = () => {
    if (!url) return;
    axios
      .get(url)
      .then((res) => {
        setData(res.data["hydra:member"]);
        console.log(res.data["hydra:member"]);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  };

  function search(a) {
    console.log("search" + a);
    axios
      // .get(`http://localhost:8000/api/${choix}?page=1&name=${a}`)
      .get(`https://127.0.0.1:8000/api/${choix}?page=1&name=${a}`)
      .then((res) => {
        setData(res.data["hydra:member"]);
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  }
  if (choix === "cpu") {
    return (
      <div>
        <button type="button" onClick={cpu}>
          cpu
        </button>
        <button type="button" onClick={gpu}>
          gpu
        </button>
        <h1>pranked</h1>
      </div>
    );
  } else {
    return (
      <div className="App">
        <button type="button" onClick={cpu}>
          cpu
        </button>
        <button type="button" onClick={gpu}>
          gpu
        </button>
        <input
          type="text"
          id="message"
          name="message"
          onChange={handleChange}
          value={message}
          onKeyUp={(e) => search(message)}
        ></input>
        <center>
          {data.map((dataObj) => {
            return (
              <div
                style={{
                  width: "15em",
                  backgroundColor: "grey",
                  padding: 2,
                  borderRadius: 10,
                  marginBlock: 10,
                }}
              >
                <a href={"produits/" + categorie + "/" + dataObj.id}>
                  <p style={{ fontSize: 20, color: "white" }}>{dataObj.name}</p>
                  <p style={{ fontSize: 20, color: "white" }}>
                    {dataObj.price}€
                  </p>
                </a>
              </div>
            );
          })}
        </center>
      </div>
    );
  }
}
