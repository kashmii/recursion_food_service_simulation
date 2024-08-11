<?php

namespace Invoices;

class Invoice
{
  // 属性: float finalPrice, Timestamp orderTime, int estimatedTimeInMinutes
  protected float $finalPrice;
  protected string $orderTime;
  protected int $estimatedTimeInMinutes;

  public function __construct(string $orderTime)
  {
    $this->finalPrice = 0.0;
    $this->orderTime = $orderTime;
    $this->estimatedTimeInMinutes = 0;
  }

  public function getFinalPrice(): float
  {
    return $this->finalPrice;
  }

  public function getOrderTime(): string
  {
    return $this->orderTime;
  }

  public function addEstimatedTimeInMinutes(int $estimatedTimeInMinutes): void
  {
    $this->estimatedTimeInMinutes += $estimatedTimeInMinutes;
  }

  public function addPrice(float $price): void
  {
    $this->finalPrice += $price;
  }

  public function printInvoice(): void
  {
    $date = $this->getOrderTime();
    $price = $this->getFinalPrice();
    $border = "--------------------------------\n";

    printf(
      "%sDate: %s\nFinal Price: $%s\n%s ",
      $border,
      $date,
      number_format($price, 2),
      $border
    );
  }
}
