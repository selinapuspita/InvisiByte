import sys
from PIL import Image
import stepic
import os

def encode(image_path, message, output_path):
    image_path = os.path.abspath(image_path)
    output_path = os.path.abspath(output_path)
    
    # print(f"Using image: {image_path}")
    # print(f"Saving to: {output_path}")

    if not os.path.exists(image_path):
        print(f"Error: File {image_path} tidak ditemukan.")
        sys.exit(1)

    image = Image.open(image_path)
    encoded_image = stepic.encode(image, message.encode())  
    encoded_image.save(output_path)

    print("Encoding Selesai!")

def decode(image_path):
    image_path = os.path.abspath(image_path)

    if not os.path.exists(image_path):
        print(f"Error: File {image_path} tidak ditemukan.")
        sys.exit(1)

    image = Image.open(image_path)
    decoded_message = stepic.decode(image)
    print(decoded_message)

if __name__ == "__main__":
    if len(sys.argv) < 3:
        print("Error: Argumen tidak lengkap.")
        sys.exit(1)

    command = sys.argv[1]

    if command == "encode":
        if len(sys.argv) < 5:
            print("Error: Argumen untuk encode tidak lengkap.")
            sys.exit(1)
        encode(sys.argv[2], sys.argv[3], sys.argv[4])
    elif command == "decode":
        decode(sys.argv[2])
    else:
        print("Perintah tidak valid. Gunakan 'encode' atau 'decode'.")
