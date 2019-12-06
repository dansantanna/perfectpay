const formatDate = val => {
    const getTwoDigits = value => (value < 10 ? `0${value}` : value)

    const date = new Date(val)
    const day = getTwoDigits(date.getDate())
    const month = getTwoDigits(date.getMonth() + 1) // add 1 since getMonth returns 0-11 for the months
    const year = date.getFullYear()

    return `${year}-${month}-${day}`
}

const populateSelectProducts = data => {
    const select = document.getElementById('product-list')
    data.forEach(item => {
        const option = document.createElement('option')
        option.value = item.id
        option.text = item.name
        select.appendChild(option)
    })
}

fetch('/api/products')
    .then(res => res.json())
    .then(populateSelectProducts)

const sale_id = document.getElementById('sale_id').value

fetch(`/api/sales/${sale_id}`)
    .then(res => res.json())
    .then(data => {
        document.getElementById('product-list').value = data.product.id
        document.getElementById('created_at').value = formatDate(
            data.created_at
        )
        document.getElementById('sale_amount').value = data.sale_amount
    })

document.getElementById('form-update').addEventListener('submit', evt => {
    evt.preventDefault()
    const product_id = document.getElementById('product-list').value
    const created_at = document.getElementById('created_at').value
    const sale_amount = document.getElementById('sale_amount').value
    fetch(`/api/sales/${sale_id}`, {
        method: 'PUT',
        mode: 'cors',
        cache: 'default',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ product_id, created_at, sale_amount })
    }).then(() => (location.href = '/'))
})
