import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import axios from "axios";

const Checkout = () => {
    const [carts, setCarts] = useState([]);
    const [total, setTotal] = useState(0);
    const [provinces, setProvinces] = useState([]);
    const [cities, setCities] = useState([]);
    const [services, setServices] = useState([]);
    const [loading, setLoading] = useState(true);
    const [wait, setWait] = useState(false);
    const [fullName, setFullName] = useState("");
    const [province, setProvince] = useState("");
    const [city, setCity] = useState("");
    const [shippingService, setShippingService] = useState("");
    const [address, setAddress] = useState("");
    const [address2, setAddress2] = useState("");
    const [postcode, setPostcode] = useState("");
    const [phone, setPhone] = useState("");
    const [email, setEmail] = useState("");
    const [notes, setNotes] = useState("");

    useEffect(() => {
        axios.get("/carts").then((res) => {
            if (res.status === 200) {
                setCarts(Object.values(res.data.carts));
                setTotal(res.data.cart_total);
            }
            setLoading(false);
        });

        axios.get("/api/provinces").then((res) => {
            if (res.status === 200) {
                setProvinces(Object.values(res.data.provinces));
            }
            setLoading(false);
        });
        axios.get("/api/users").then((res) => {
            if (res.status === 200) {
                if (res.data.users.province_id != null) {
                    setProvinceId(res.data.users.province_id);
                    setCityId(res.data.users.city_id);
                }
                setFullName(
                    res.data.users.username == null
                        ? ""
                        : res.data.users.username
                );
                setProvince(
                    res.data.users.province_id == null
                        ? ""
                        : res.data.users.province_id
                );
                setCity(
                    res.data.users.city_id == null ? "" : res.data.users.city_id
                );
                setAddress(
                    res.data.users.address == null ? "" : res.data.users.address
                );
                setAddress2(
                    res.data.users.address2 == null
                        ? ""
                        : res.data.users.address2
                );
                setPostcode(
                    res.data.users.postcode == null
                        ? ""
                        : res.data.users.postcode
                );
                setPhone(
                    res.data.users.phone == null ? "" : res.data.users.phone
                );
                setEmail(
                    res.data.users.email == null ? "" : res.data.users.email
                );
                setNotes(
                    res.data.users.notes == null ? "" : res.data.users.notes
                );
            }
            setLoading(false);
        });
    }, []);

    const setProvinceId = (provinceId) => {
        setProvince(provinceId);
        axios.get(`/api/cities?provinceId=${provinceId}`).then((res) => {
            if (res.status === 200) {
                setCities(res.data.cities);
            }
            setLoading(false);
        });
    };

    const setCityId = (city) => {
        setCity(city);
        setWait(true);
        axios.get(`/api/shipping-cost?city=${city}`).then((res) => {
            setServices(res.data.results);
            setLoading(false);
            setWait(false);
        });
    };

    const setShippingCostId = (service) => {
        setShippingService(service);
        setWait(true);
        const cityId = document.getElementById("city").value;

        axios
            .post(`/api/set-shipping`, {
                shipping_service: service,
                city_id: cityId,
            })
            .then((res) => {
                setTotal(res.data.data.total);
                setLoading(false);
                setWait(false);
            });
    };

    const placeOrder = (e) => {
        e.preventDefault();
        setWait(true);
        axios
            .post(`/api/checkout`, {
                fullName,
                province,
                city,
                shippingService,
                address,
                address2,
                postcode,
                phone,
                email,
                notes,
            })
            .then((res) => {
                setTotal(0);
                window.location.href = res.data;
                return null;
            });
    };

    return (
        <>
            <div className="checkout__htmlForm">
                <h4 className="mb-5">Billing Details</h4>
                <form onSubmit={placeOrder}>
                    <div className="row">
                        <div className="col-lg-8 col-md-6">
                            <div className="row">
                                <div className="col-lg-12">
                                    <div className="checkout__input">
                                        <p>
                                            Full Name<span>*</span>
                                        </p>
                                        <input
                                            type="text"
                                            value={fullName}
                                            onChange={(e) =>
                                                setFullName(e.target.value)
                                            }
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Province<span>*</span>
                                </p>
                                <select
                                    className="form-control"
                                    value={province}
                                    onChange={(e) =>
                                        setProvinceId(e.target.value)
                                    }
                                >
                                    <option value="">=== Choose ===</option>
                                    {provinces.map((province, index) => {
                                        return (
                                            <option
                                                key={index}
                                                value={index + 1}
                                            >
                                                {province}
                                            </option>
                                        );
                                    })}
                                </select>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    City<span>*</span>
                                </p>
                                <select
                                    id="city"
                                    className="form-control"
                                    value={city}
                                    onChange={(e) => setCityId(e.target.value)}
                                >
                                    <option value="">=== Choose ===</option>
                                    {Object.entries(cities).map(
                                        (city, index) => {
                                            return (
                                                <option
                                                    key={index}
                                                    value={city[0]}
                                                >
                                                    {city[1]}
                                                </option>
                                            );
                                        }
                                    )}
                                </select>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Shipping Service<span>*</span>
                                </p>
                                <select
                                    className="form-control"
                                    value={shippingService}
                                    onChange={(e) =>
                                        setShippingCostId(e.target.value)
                                    }
                                >
                                    <option value="">=== Choose ===</option>
                                    {services.map((service, index) => {
                                        return (
                                            <option
                                                key={index}
                                                value={service.service.replace(
                                                    /\s/g,
                                                    ""
                                                )}
                                            >{`${service.service} | ${service.cost} | ${service.etd} `}</option>
                                        );
                                    })}
                                </select>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Address<span>*</span>
                                </p>
                                <input
                                    placeholder="Street Address"
                                    className="checkout__input__add"
                                    type="text"
                                    value={address}
                                    onChange={(e) => setAddress(e.target.value)}
                                />
                                <input
                                    type="text"
                                    value={address2}
                                    onChange={(e) =>
                                        setAddress2(e.target.value)
                                    }
                                    placeholder="Apartment, suite, unite ect (optinal)"
                                />
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Postcode / ZIP<span>*</span>
                                </p>
                                <input
                                    type="text"
                                    value={postcode}
                                    onChange={(e) =>
                                        setPostcode(e.target.value)
                                    }
                                />
                            </div>
                            <div className="row">
                                <div className="col-lg-6">
                                    <div className="checkout__input">
                                        <p>
                                            Phone<span>*</span>
                                        </p>
                                        <input
                                            type="text"
                                            value={phone}
                                            onChange={(e) =>
                                                setPhone(e.target.value)
                                            }
                                        />
                                    </div>
                                </div>
                                <div className="col-lg-6">
                                    <div className="checkout__input">
                                        <p>
                                            Email<span>*</span>
                                        </p>
                                        <input
                                            type="text"
                                            value={email}
                                            onChange={(e) =>
                                                setEmail(e.target.value)
                                            }
                                        />
                                    </div>
                                </div>
                            </div>
                            <div className="checkout__input">
                                <p>
                                    Order notes<span>*</span>
                                </p>
                                <input
                                    type="text"
                                    value={notes}
                                    onChange={(e) => setNotes(e.target.value)}
                                    placeholder="Notes about your order, e.g. special notes htmlFor delivery."
                                />
                            </div>
                        </div>
                        <div className="col-lg-4 col-md-6">
                            <div className="checkout__order">
                                <h4>Your Order</h4>
                                <div className="checkout__order__products">
                                    Products <span>Total</span>
                                </div>
                                <ul>
                                    {loading ? (
                                        <h3>Loading...</h3>
                                    ) : (
                                        carts.map((cart, index) => {
                                            return (
                                                <li key={index}>
                                                    {cart.name} ({cart.quantity}{" "}
                                                    x {cart.price})
                                                    <span>
                                                        $
                                                        {cart.price *
                                                            cart.quantity}
                                                    </span>
                                                </li>
                                            );
                                        })
                                    )}
                                </ul>
                                <div className="checkout__order__total">
                                    Total <span>${total}</span>
                                </div>
                                {wait ? (
                                    <button
                                        type="submit"
                                        className="site-btn disabled"
                                    >
                                        Loading....
                                    </button>
                                ) : (
                                    <button type="submit" className="site-btn">
                                        PLACE ORDER
                                    </button>
                                )}
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </>
    );
};

export default Checkout;

if (document.getElementById("checkout")) {
    ReactDOM.render(<Checkout />, document.getElementById("checkout"));
}
