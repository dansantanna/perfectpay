const fomatMoney = val =>
    `R$ ${val
        .toFixed(2)
        .toString()
        .replace('.', ',')}`

const formatDate = val => {
    const date = new Date(val)
    return `${date.getDay() + 1}/${date.getMonth() + 1}/${date.getFullYear()}`
}

const formatDateToSend = val => {
    const date = new Date(val)
    console.log('date', date)
    return `${date.getFullYear()}-${date.getMonth() + 1}-${date.getUTCDate()}`
}

const populateTableSales = data => {
    const table = document.getElementById('sale-table')
    table.innerHTML = ''
    data.forEach(item => {
        const row = document.createElement('tr')

        const product = document.createElement('td')
        product.innerText = item.product.name
        row.appendChild(product)

        const data = document.createElement('td')
        data.innerText = formatDate(item.created_at)
        row.appendChild(data)

        const price = document.createElement('td')
        price.innerText = fomatMoney(item.product.price)
        row.appendChild(price)

        const action = document.createElement('td')
        action.innerHTML = `<a href='/edit/${item.id}'><button type='button' class='btn btn-outline-success'>Editar</button></a>`
        row.appendChild(action)

        table.appendChild(row)
    })
}

const populateTableResult = data => {
    const table = document.getElementById('sale-result')
    table.innerHTML = ''
    data.forEach(item => {
        const row = document.createElement('tr')

        const status = document.createElement('td')
        status.innerText = item.status
        row.appendChild(status)

        const quantity = document.createElement('td')
        quantity.innerText = item.quantity
        row.appendChild(quantity)

        const amount = document.createElement('td')
        amount.innerText = fomatMoney(item.amount)
        row.appendChild(amount)

        table.appendChild(row)
    })
}

const populateSelectClients = data => {
    const select = document.getElementById('client-list')
    data.forEach(item => {
        const option = document.createElement('option')
        option.value = item.id
        option.text = item.name
        select.appendChild(option)
    })
}

document.getElementById('btn-filter').addEventListener('click', () => {
    const filter = {}
    const created_at = document.getElementById('created_at').value
    const customer_id = document.getElementById('client-list').value

    if (created_at) filter.created_at = formatDateToSend(created_at)
    if (customer_id) filter.customer_id = customer_id

    search(filter)
})

function search(filter = {}) {
    const params = new URLSearchParams(filter)
    fetch(`/api/sales?${params}`)
        .then(res => res.json())
        .then(populateTableSales)

    fetch(`/api/sales/groups?${params}`)
        .then(res => res.json())
        .then(populateTableResult)
}

search()

fetch('/api/customers')
    .then(res => res.json())
    .then(populateSelectClients)
