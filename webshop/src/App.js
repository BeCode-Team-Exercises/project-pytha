import React, { Component } from "react";
import logo from "./logo.svg";
import "./css//reset.css";
import "./css//bootstrap.css";
import "./css/App.css";
import Header from "./Header";
import Products from "./Products";


class App extends Component {
  render() {
    return (
      <div className="App">
        {/* to do create head */}
        <Header />
        <body className="container-fluid">
          <Products/>
          <a>See more products</a>
        </body>
      </div>
    );
  }
}


export default App;
