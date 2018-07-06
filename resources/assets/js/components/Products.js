import React, {Component} from "react";
import ReactDOM from "react-dom";
import Product from "./Product";
import AddProduct from "./AddProduct";

export default class Products extends Component {

    constructor() {

        super();
        //Initialize the state in the constructor
        this.state = {
            products: [],
            currentProduct: null
        }
    }

    /*componentDidMount() is a lifecycle method
     * that gets called after the component is rendered
     */
    componentDidMount() {
        /* fetch API in action */
        fetch('/api/products')
            .then(response => {
                return response.json();
            })
            .then(products => {
                //Fetched product is stored in the state
                this.setState({products});
            });
    }

    renderProducts() {
        return this.state.products.map(product => {
            return (
                //this.handleClick() method is invoked onClick.
                <li onClick={
                    () => this.handleClick(product)} key={product.id}>
                    { product.description }
                </li>
            );
        })
    }

    handleClick(product) {
        //handleClick is used to set the state
        this.setState({currentProduct: product});
    }

    handleAddProduct(product) {

        product.price = Number(product.price);
        /*Fetch API for post request */
        fetch('api/products/', {
            method: 'post',
            /* headers are important*/
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },

            body: JSON.stringify(product)
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                //update the state of products and currentProduct
                this.setState((prevState) => ({
                    products: prevState.products.concat(data),
                    currentProduct: data
                }))
            })
    }

    handleUpdateProduct(product) {

        const currentProduct = this.state.currentProduct;
        fetch('api/products/' + currentProduct.id, {
            method: 'put',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(product)
        })
            .then(response => {
                return response.json();
            })
            .then(data => {
                /* Updating the state */
                var array = this.state.products.filter(function (item) {
                    return item !== currentProduct
                })
                this.setState((prevState) => ({
                    products: array.concat(product),
                    currentProduct: product
                }))
            })
    }

    handleDeleteProduct() {
        const currentProduct = this.state.currentProduct;
        fetch('api/products/' + this.state.currentProduct.id, {
            method: 'delete'
        }).then(response => {

            /* Duplicate the array and filter out the item to be deleted */
            var array = this.state.products.filter(function (item) {
                return item !== currentProduct
            });

            this.setState({products: array, currentProduct: null});

        });
    }

    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">Example Component</div>
                            <div className="card-body">
                                I'm an example component!
                            </div>
                        </div>
                    </div>
                </div>

                <div className="row" style={{padding: 20}}>
                    <div className="col-md-4">
                        <h3> All products </h3>
                        <ul>
                            { this.renderProducts() }
                        </ul>
                    </div>

                    <div className="col-md-8">
                        <AddProduct onAdd={this.handleAddProduct.bind(this)}/>
                        <Product product={this.state.currentProduct}/>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('example')) {
    ReactDOM.render(<Products />, document.getElementById('example'));
}
