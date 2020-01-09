import React, { Component } from "react";
import Product from "./Product";
import "./reset.css";
import "./bootstrap.css";
import "./App.css";

class Products extends Component {
  render() {
    return (
      <article className="row">
        <Product />
        <Product />
        <Product />
        <Product />
        <Product />
        <Product />
        <Product />
        <Product />
      </article>
    );
  }
}

export default Products;
