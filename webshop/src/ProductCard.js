import React, { Component } from "react";
import "./css/reset.css";
import "./css/bootstrap.css";
import "./css/App.css";

const variabeleBuitenKlasse = "variabele buiten klasse";

class ProductCard extends Component {
  variabeleBinnenKlasse = "variabele binnen klasse";

  constructor(props) {
    super(props);
    // to do: change stock to original stock of object.
    // Also is this the best level for state or do I need to create a state that als ocaptures id of product
    this.state = {
      product_selected: "",
      stock: 10
    };
  }

  handleChange = event => {
    // also need to changed displayed stock on the basis of click
    this.setState((state, props) => ({
      product_selected: this.props.product_info.name,
      // to do: add check to see if there still is something in stock - at least on the basis of first api-call
      // (possible that multiple people order at the same time and that the stock has changed in the meantime, but that's for later)
      stock: this.state.stock - 1
    }));
  };

  logvariabeleBuitenKlasseArrow = () => {
    console.log(variabeleBuitenKlasse);
    const logvariabeleBuitenKlasseArrow2 = () => {
      console.log(
        `tweede niveau, buiten variabele, arrow functie: ${variabeleBuitenKlasse}`
      );
    };
    logvariabeleBuitenKlasseArrow2();
  };

  logvariabeleBuitenKlasseRegular = function() {
    console.log(variabeleBuitenKlasse);
    const logvariabeleBuitenKlasseRegular2 = function() {
      console.log(
        `tweede niveau, buiten variabele, regular functie: ${variabeleBuitenKlasse}`
      );
    };
    logvariabeleBuitenKlasseRegular2();
  };

  logvariabeleBinnenKlasseArrow = () => {
    console.log(this.variabeleBinnenKlasse);
    const logvariabeleBinnenKlasseArrow2 = () => {
      console.log(
        `tweede niveau, binnen variabele, arrow functie: ${this.variabeleBinnenKlasse}`
      );
    };
    logvariabeleBinnenKlasseArrow2();
  };

  logvariabeleBinnenKlasseRegular = function() {
    console.log(this.variabeleBinnenKlasse);
    const constlogvariabeleBinnenKlasseRegular2 = function() {
      console.log(
        // HIER ZIT HET VERSCHIL TUSSEN ARROW EN REGULAR FUNCTIES: DIE this is niet beschibkaar in tweede niveau van regular functie (wel op het eerste)
        `tweede niveau, binnen variabele, regular functie: ${this.variabeleBinnenKlasse}`
      );
    };
    constlogvariabeleBinnenKlasseRegular2();
  };

  render() {
    const { product_info } = this.props;

    const actual_price =
      parseInt(product_info.price_per_unit) +
      parseInt(product_info.price_per_unit) *
        (parseInt(product_info.tax_percentage) / 100);

    return (
      // note: had problems setting equal boxes with bootsstrap. Class overflow-hidden did not work as expected and set inline-styles here
      // to do: figure out styling in a more elegant manner
      <div className="col-md-3 text-center" style={{ height: "40rem" }}>
        <div className="card" style={{ height: "90%" }}>
          <img className="card-img-top" alt="" style={{ height: "25%" }} />
          <div className="card-body" style={{ height: "75%" }}>
            <h5 className="card-title" style={{ height: "10%" }}>
              {product_info.name}
            </h5>
            <p
              className="card-text"
              style={{ height: "50%", maxHeight: "100%", overflow: "scroll" }}
            >
              {product_info.description}
            </p>
            <p style={{ height: "5%" }}>{`in stock: ${product_info.stock}`}</p>
            <p style={{ height: "5%" }}>{`${actual_price} euro`}</p>
            {/*           <a href="" className="btn btn-primary">
            TO DO: MORE INFO POP-UP
          </a> */}
            <input
              className="btn btn-info"
              type="button"
              value="Submit"
              onClick={this.handleChange}
              style={{ height: "15%", marginBottom: "15%" }}
            />
            {this.logvariabeleBinnenKlasseRegular()}
            {/*             {console.log(this.variabeleBinnenKlasse)}
             */}{" "}
          </div>
        </div>
      </div>
    );
  }
}

export default ProductCard;
