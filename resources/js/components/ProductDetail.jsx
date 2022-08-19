import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import swal from "sweetalert";

const ProductDetail = () => {
    const [product, setProduct] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState("");

    const [selectedImage, setSelectedImage] = useState();
    const [quantity, setQuantity] = useState(1);

    const search = window.location.pathname;
    let slug = search.split("/").slice(-1).pop();

    useEffect(() => {
        axios
            .get(`/product-detail/${slug}`)
            .then((res) => {
                console.log(res.data.product.media);
                if (res.status === 200) {
                    setProduct(res.data.product);
                    setSelectedImage(res.data.product.media[0].original_url);
                }
                setLoading(false);
            })
            .catch((error) => {
                setError(error.response.statusText);
                setLoading(false);
            });
    }, []);

    const addToCart = (e) => {
        e.preventDefault();

        const productId = product.id;

        axios.post("/carts", { productId, quantity }).then((res) => {
            if (res.status === 200) {
                swal("Success", "Added to Cart !", "success");
                window.location.reload();
            }
        });
    };

    return (
        <>
            {loading ? (
                <h3>Loading...</h3>
            ) : (
                <div className="container">
                    <div className="row">
                        <div className="col-lg-6 col-md-6">
                            <div className="product__details__pic">
                                <div className="product__details__pic__item">
                                    <img
                                        className="product__details__pic__item--large"
                                        src={selectedImage}
                                        alt="mm"
                                    />
                                </div>
                                <div
                                    className="product__details__pic__slider"
                                    style={{
                                        columnGap: ".8rem",
                                        display: "flex",
                                    }}
                                >
                                    {product.media.map((p) => {
                                        return (
                                            <img
                                                style={{ width: "100px" }}
                                                key={p.id}
                                                src={p.original_url}
                                                alt={p.file_name}
                                                onClick={() =>
                                                    setSelectedImage(
                                                        p.original_url
                                                    )
                                                }
                                            />
                                        );
                                    })}
                                </div>
                            </div>
                        </div>
                        <div className="col-lg-6 col-md-6">
                            <div className="product__details__text">
                                <h3>{product.name}</h3>
                                <div className="product__details__rating">
                                    <i className="fa fa-star"></i>
                                    <i className="fa fa-star"></i>
                                    <i className="fa fa-star"></i>
                                    <i className="fa fa-star"></i>
                                    <i className="fa fa-star-half-o"></i>
                                    <span>(18 reviews)</span>
                                </div>
                                <div className="product__details__price">
                                    ${product.price}
                                </div>
                                <p>{product.description}</p>
                                <form
                                    onSubmit={addToCart}
                                    style={{ display: "inline-block" }}
                                >
                                    <div className="product__details__quantity">
                                        <div className="quantity">
                                            <div className="pro-qty">
                                                <select
                                                    style={{ height: "50px" }}
                                                    className="form-control"
                                                    value={quantity}
                                                    name="quantity"
                                                    onChange={(e) =>
                                                        setQuantity(
                                                            e.target.value
                                                        )
                                                    }
                                                >
                                                    {[
                                                        ...Array(
                                                            product.quantity
                                                        ).keys(),
                                                    ].map((x) => (
                                                        <option
                                                            key={x + 1}
                                                            value={x + 1}
                                                        >
                                                            {x + 1}
                                                        </option>
                                                    ))}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        type="submit"
                                        className="primary-btn"
                                        style={{ border: "none" }}
                                    >
                                        ADD TO CARD
                                    </button>
                                </form>
                                <a href="#" className="heart-icon">
                                    <span className="icon_heart_alt"></span>
                                </a>
                                <ul>
                                    <li>
                                        <b>Weight</b>{" "}
                                        <span>{product.weight} gram</span>
                                    </li>
                                    <li>
                                        <b>Share on</b>
                                        <div className="share">
                                            <a href="#">
                                                <i className="fa fa-facebook"></i>
                                            </a>
                                            <a href="#">
                                                <i className="fa fa-twitter"></i>
                                            </a>
                                            <a href="#">
                                                <i className="fa fa-instagram"></i>
                                            </a>
                                            <a href="#">
                                                <i className="fa fa-pinterest"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-12">
                            <div className="product__details__tab">
                                <ul className="nav nav-tabs" role="tablist">
                                    <li className="nav-item">
                                        <a
                                            className="nav-link active"
                                            data-toggle="tab"
                                            href="#tabs-1"
                                            role="tab"
                                            aria-selected="true"
                                        >
                                            Description
                                        </a>
                                    </li>
                                    <li className="nav-item">
                                        <a
                                            className="nav-link"
                                            data-toggle="tab"
                                            href="#tabs-3"
                                            role="tab"
                                            aria-selected="false"
                                        >
                                            Reviews <span>(1)</span>
                                        </a>
                                    </li>
                                </ul>
                                <div className="tab-content">
                                    <div
                                        className="tab-pane active"
                                        id="tabs-1"
                                        role="tabpanel"
                                    >
                                        <div className="product__details__tab__desc">
                                            <h6>Products Infomation</h6>
                                            {product.details}
                                        </div>
                                    </div>
                                    <div
                                        className="tab-pane"
                                        id="tabs-3"
                                        role="tabpanel"
                                    >
                                        <div className="product__details__tab__desc">
                                            <h6>Products Infomation</h6>
                                            <p>
                                                Vestibulum ac diam sit amet quam
                                                vehicula elementum sed sit amet
                                                dui. Pellentesque in ipsum id
                                                orci porta dapibus. Proin eget
                                                tortor risus. Vivamus suscipit
                                                tortor eget felis porttitor
                                                volutpat. Vestibulum ac diam sit
                                                amet quam vehicula elementum sed
                                                sit amet dui. Donec rutrum
                                                congue leo eget malesuada.
                                                Vivamus suscipit tortor eget
                                                felis porttitor volutpat.
                                                Curabitur arcu erat, accumsan id
                                                imperdiet et, porttitor at sem.
                                                Praesent sapien massa, convallis
                                                a pellentesque nec, egestas non
                                                nisi. Vestibulum ac diam sit
                                                amet quam vehicula elementum sed
                                                sit amet dui. Vestibulum ante
                                                ipsum primis in faucibus orci
                                                luctus et ultrices posuere
                                                cubilia Curae; Donec velit
                                                neque, auctor sit amet aliquam
                                                vel, ullamcorper sit amet
                                                ligula. Proin eget tortor risus.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            )}
        </>
    );
};

export default ProductDetail;

if (document.getElementById("product-detail")) {
    ReactDOM.render(
        <ProductDetail />,
        document.getElementById("product-detail")
    );
}
