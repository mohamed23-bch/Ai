import requests
from bs4 import BeautifulSoup
import csv

def scrape_facebook_page(page_name):
    url = f"https://mbasic.facebook.com/{page_name}"
    response = requests.get(url)
    
    # Debug: Print the response status and part of the HTML content
    print(f"Response Status: {response.status_code}")
    print("Response HTML snippet:", response.text[:500])  # Print the first 500 characters of the HTML
    
    if response.status_code != 200:
        print("Failed to retrieve the page. Check the page name and network connection.")
        return []
    
    soup = BeautifulSoup(response.text, 'html.parser')
    
    posts = []
    
    # Loop through post containers, which may have slightly different structures
    for article in soup.find_all('div', {'class': "x1y1aw1k xn6708d xwib8y2 x1ye3gou"}):
        post = {}
        
        # Extract post text
        post_text = article.text.strip() if article else ''
        print(f"Found post: {post_text}")  # Debug: Print the post text
        
        post['text'] = post_text
        
        # Extract time of the post
        time_element = article.find('abbr')
        post['time'] = time_element.text if time_element else ''
        
        # Extract likes and comments from the footer
        footer = article.find_next('footer')
        if footer:
            likes = footer.find('a', href=lambda x: x and 'reaction/profile' in x)
            post['likes'] = likes.text.split()[0] if likes else '0'
            
            comments = footer.find('a', href=lambda x: x and 'comment' in x)
            post['comments'] = comments.text.split()[0] if comments else '0'
        else:
            post['likes'] = '0'
            post['comments'] = '0'
        
        posts.append(post)
    
    return posts

# User input for the page name
page_name = input('Enter Facebook Page Name: ')

try:
    # Scrape the data
    scraped_data = scrape_facebook_page(page_name)
    print(f"Scraped data: {scraped_data}")  # Debug: Print the scraped data
    
    # Save to a CSV file
    csv_filename = f"{page_name}_posts.csv"
    with open(csv_filename, "w", newline='', encoding="utf-8") as csvfile:
        fieldnames = ['text', 'time', 'likes', 'comments']
        writer = csv.DictWriter(csvfile, fieldnames=fieldnames)

        writer.writeheader()
        for post in scraped_data:
            writer.writerow(post)

    print(f"Data saved to {csv_filename}")

except Exception as e:
    print(f"An error occurred: {e}")
    print("This could be due to network issues, the page not being accessible, or changes in Facebook's structure.")
