✅ test_system.py (for Pair-a-feet)

import requests

BASE_URL = "http://localhost/Pair-a-feet"

def test_page(endpoint, name):
    try:
        response = requests.get(f"{BASE_URL}/{endpoint}")
        if response.status_code == 200:
            print(f"✅ {name} ({endpoint}) is accessible.")
        else:
            print(f"❌ {name} ({endpoint}) returned status code {response.status_code}.")
    except Exception as e:
        print(f"❌ {name} ({endpoint}) raised an error: {e}")

def run_tests():
    pages = {
        "index.php": "Homepage",
        "login.php": "Login Page",
        "product.php": "Product Page",
        "product-single.php": "Product Details",
        "cart.php": "Cart Page",
        "checkout.php": "Checkout Page",
        "wishlist.php": "Wishlist Page",
        "my-account.php": "My Account",
        "contact.php": "Contact Page",
        "about.php": "About Page",
        "blog.php": "Blog Page",
        "blog-detail.php": "Blog Detail Page",
        "admin/": "Admin Dashboard (folder)",
    }

    for endpoint, name in pages.items():
        test_page(endpoint, name)

if __name__ == "__main__":
    run_tests()

▶️ How to use:

    Install the requests library if you haven’t already:

pip install requests

Place test_system.py in the root of your Pair-a-feet project.

Run it while your server (XAMPP/WAMP) is running:

python test_system.py
