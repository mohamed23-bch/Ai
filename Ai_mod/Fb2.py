from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.chrome.service import Service
import time

# Specify the actual path to chromedriver.exe
path = 'C:\Program Files (x86)\chromedriver.exe'  # Replace with your actual path

# Initialize the Service object
service = Service(executable_path=path)

# Start the WebDriver
driver = webdriver.Chrome(service=service)

# Get the Facebook page name from the user
page = input('Enter page Name = ')

# Construct the URL
url = f'https://www.facebook.com/{page}'

print(f"Navigating to {url}")

# Open the page
driver.get(url)

# Wait for the page to load
time.sleep(5)

# Get the page source
resp = driver.page_source

# Close the WebDriver
driver.close()

# Parse the page source with BeautifulSoup
soup = BeautifulSoup(resp, 'html.parser')

# Find the specific divs you are interested in
details = soup.find_all("div", {
    "class": "x9f619 x1n2onr6 x1ja2u2z x78zum5 x2lah0s x1nhvcw1 x1qjc9v5 xozqiw3 x1q0g3np xyamay9 xykv574 xbmpl8g x4cne27 xifccgj"
})

# Print the details found
print(details)
