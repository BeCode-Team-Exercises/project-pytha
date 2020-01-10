import React, { Component } from "react";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class ProductCard extends Component {
  render() {
    const { product_info } = this.props;
    return (
      <div className="card col-md-3">
        <img className="card-img-top" alt="" />
        <div className="card-body">
          <h5 className="card-title">{product_info.name}</h5>
          <p className="card-text">
          {product_info.description}
          </p>
          <p>{`${product_info.price_per_unit} euro`}</p>
          <a href="" className="btn btn-primary">
            Go somewhere
          </a>
        </div>
      </div>
    );
  }
}

export default ProductCard;
