import * as fn from "./functions.js"

document.addEventListener("DOMContentLoaded", () => {
    const emptyBasketNode = document.querySelector(".no-product")
    const notEmptyBasketNode = document.querySelector(".has-products")
    const successNode = document.querySelector(".basket-content .state.success")
    const errorNode = document.querySelector(".basket-content .state.error")
    const orderFormNode = document.querySelector(".order-form")

    document.addEventListener("click", async clickEvent => {
        const target = clickEvent.target.closest("[data-js=removable]")
        if (!target) return

        fn.updateTotalPrice({
            productID: target.dataset.id,
            amount: 0,
        });

        const productContainer = target.closest("[data-js=product-container]")

        if (!productContainer) {
            console.error("The product conainter isn't found")
            return
        }

        productContainer.remove()

        const someProductCart = document.querySelector("#basket [data-js=product]")

        emptyBasketNode.setAttribute("data-hidden", someProductCart ? "true" : "false")
        notEmptyBasketNode.setAttribute("data-hidden", someProductCart ? "false" : "true")
    })

    function error() {
        emptyBasketNode.setAttribute("data-hidden", "true")
        notEmptyBasketNode.setAttribute("data-hidden", "true")
        successNode.setAttribute("data-hidden", "true")

        errorNode.setAttribute("data-hidden", "false")
    }

    function success() {
        emptyBasketNode.setAttribute("data-hidden", "true")
        notEmptyBasketNode.setAttribute("data-hidden", "true")
        errorNode.setAttribute("data-hidden", "true")

        successNode.setAttribute("data-hidden", "false")
    }

    orderFormNode.addEventListener("submit", async e => {
        e.preventDefault()

        const body = new FormData(e.target);
        body.append("ajax", true)

        let result

        try {
            result = await fetch(`/api/order`, {
                method: "POST",
                body,
                withCredentials: true,
            })

            result = await result.json()
        } catch (e) {
            console.error(e)

            error()
            return
        }

        if (result.status === "success") {
            success()
        } else {
            error()
        }
    })
})
