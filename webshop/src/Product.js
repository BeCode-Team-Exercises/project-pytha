import React, { Component } from "react";
import "./reset.css";
import "./bootstrap.css";
import "./App.css";

class Product extends Component {
  render() {
    return (
      <div className="card col-md-3">
        <img className="card-img-top" />
        <div className="card-body">
          <h5 className="card-title">Product</h5>
          <p className="card-text">
            Some quick example text to build on the card title and make up the
            bulk of the card's content.
          </p>
          <a href="" className="btn btn-primary">
            Go somewhere
          </a>
        </div>
      </div>
    );
  }
}

export default Product;
