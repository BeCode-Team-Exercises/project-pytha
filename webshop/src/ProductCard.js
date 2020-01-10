import React, { Component } from "react";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

class ProductCard extends Component {
  render() {
    const { product_info } = this.props;

    const actual_price =
      product_info.price_per_unit + (product_info.price_per_unit * (product_info.tax_percentage / 100));

    return (
      <div className="card col-md-3">
        <img className="card-img-top" alt="" />
        <div className="card-body">
          <h5 className="card-title">{product_info.name}</h5>
          <p className="card-text">{product_info.description}</p>
          <p>{`${actual_price} euro`}</p>
          <a href="" className="btn btn-primary">
            Go somewhere
          </a>
        </div>
      </div>
    );
  }
}

export default ProductCard;
