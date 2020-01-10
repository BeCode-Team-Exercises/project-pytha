import React, { Component } from "react";
import ProductCard from "./ProductCard";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

{
  /* note: may want to use state at products level to dynamically display type of products */
}

class Products extends Component {
  render() {
  {/* note: for now I just created an object to test passign of properties, but in time will be an array. Will also need to change code elsewhere then*/}
    const productInfo =
      {
        name: "Diablo",
        price: 5000
      };
    return (
      <article className="row">
        {/* note: probably a foreach loop needed with a backstop if there are too many elements to render. Waiting for API-connection*/}
        <ProductCard productInfo={productInfo} />
      </article>
    );
  }
}

export default Products;
