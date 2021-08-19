import React from 'react';

export default function Header(props) {
    return (
        <header class="row block center">
            <div>
                <a href="#/">
                    <h1>Minimalist Shopping Cart</h1>
                </a>
            </div>
            <div>
                <a href="#/cart">Cart</a> <a href="#/signin">SignIn</a>
            </div>
        </header>
    ); 
}