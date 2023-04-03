<?php 
/**
 * Exercise 1: Optimize the calculateOrderTotal function.
 *
 * The current calculateOrderTotal function calculates the total cost of an order, including discounts and taxes.
 * Your task as a developer is to optimize and refactor this function to make it more efficient, readable, and maintainable.
 *
 * Here's a brief overview of the function's current logic:
 * 1. Calculate the sum of all items in the order.
 * 2. Calculate the sum of all discounts and apply them to the total.
 * 3. Ensure the order total does not go below zero after applying discounts.
 * 4. Calculate and add the tax to the order total.
 * 5. Round the total to two decimal places.
 */


function calculateOrderTotal($order) {
    $total = 0;

    // Calculate the sum of all items
    foreach ($order['items'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Calculate the sum of all discounts
    $discountsTotal = 0;
    foreach ($order['discounts'] as $discount) {
        if ($discount['type'] === 'percentage') {
            $discountsTotal += $total * ($discount['value'] / 100);
        } elseif ($discount['type'] === 'fixed') {
            $discountsTotal += $discount['value'];
        }
    }

    // Apply discounts to the total
    $total -= $discountsTotal;

    // Check if the order total is below zero
    if ($total < 0) {
        $total = 0;
    }

    // Calculate tax
    $tax = 0;
    if ($order['tax']['type'] === 'percentage') {
        $tax = $total * ($order['tax']['value'] / 100);
    } elseif ($order['tax']['type'] === 'fixed') {
        $tax = $order['tax']['value'];
    }

    // Add tax to the total
    $total += $tax;

    // Round the total to two decimal places
    $total = round($total, 2);

    return $total;
}