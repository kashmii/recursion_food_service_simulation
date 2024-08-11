# recursion_food_service_simulation

## Description

- Recursion のバックエンドプロジェクト4の課題
- 課題の目的は、オブジェクト指向プログラミングの四大柱（カプセル化、抽象化、継承、ポリモーフィズム）について実践的に学ぶこと

## 行っていること

- 飲食店のシミュレーションを行う
  - 客がレストランに行き注文を行い、レストラン側が料理を作成し請求書が作成されることを想定

## 実行方法

```bash
$ php main.php
```

### 実行結果

```
Tom wanted to eat Margherita, CheeseBurger, Spaghetti.
Tom looking at the menu, and ordered CheeseBurger x 2, Spaghetti x 1.
Anna Hoshino received the order.

Mike Smith was cooking CheeseBurger.
Mike Smith was cooking CheeseBurger.
Mike Smith was cooking Spaghetti.
Mike Smith took 24 minutes to cook.
Anna Hoshino made the invoice.
--------------------------------
Date: 2024/08/11 17:03:57
Final Price: $32.00
--------------------------------
```

## 難しかったこと

- PHP自体初めて触ったので、言語特有の記法などを理解するのに骨が折れた
- 特定のクラスの関数で別のクラスの関数を呼び出すというのが今まで意識したことのない書き方だったので、最初は戸惑った
  - 例: `Customer`クラスの`order`メソッドでreturnのあとに`Restaurant`クラスの`order`メソッドを呼び出すところ
