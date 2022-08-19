import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import swal from "sweetalert";

const ProductList = () => {
    const [products, setProducts] = useState();
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        axios.get(`products`).then((res) => {
            if (res.status === 200) {
                setProducts(res.data.products);
            }
            setLoading(false);
        });
    }, []);

    const addToCart = (e, productId) => {
        e.preventDefault();

        axios.post("carts", { productId }).then((res) => {
            if (res.status === 200) {
                swal("Success", "Added to Cart !", "success");
                window.location.reload();
            }
        });
    };

    return (
        <>
            {loading ? (
                <h2>Loading...</h2>
            ) : products.length === 0 ? (
                <h3>Not Found !</h3>
            ) : (
                products.map((product, index) => {
                    return (
                        <div
                            key={product.id}
                            className="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat"
                        >
                            <div className="featured__item">
                                <div
                                    className="featured__item__pic"
                                    style={{
                                        backgroundImage: `url(${product.media[0].original_url})`,
                                    }}
                                >
                                    <ul className="featured__item__pic__hover">
                                        <li>
                                            <a href="#">
                                                <i className="fa fa-heart"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a
                                                href="#"
                                                onClick={(e) =>
                                                    addToCart(e, product.id)
                                                }
                                            >
                                                <i className="fa fa-shopping-cart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div className="featured__item__text">
                                    <h6>
                                        <a href={`product/${product.slug}`}>
                                            {product.name}
                                        </a>
                                    </h6>
                                    <h5>${product.price}</h5>
                                </div>
                            </div>
                        </div>
                    );
                })
            )}
        </>
    );
};

export default ProductList;

if (document.getElementById("product-list")) {
    ReactDOM.render(<ProductList />, document.getElementById("product-list"));
}
