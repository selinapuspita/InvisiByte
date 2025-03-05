import sys
from PIL import Image
import stepic
import os
# import re

def encode(image_path, message, output_path):
    image_path = os.path.abspath(image_path)
    output_path = os.path.abspath(output_path)

    if not os.path.exists(image_path):
        print(f"Error: File {image_path} tidak ditemukan.")
        sys.exit(1)

    image = Image.open(image_path)
    encoded_image = stepic.encode(image, message.encode())  

    # print(f"Saving to: {output_path}") #debugging
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



# # Batas panjang pesan agar tidak terlalu besar
# MAX_MESSAGE_LENGTH = 500  

# def sanitize_message(message):
#     """ Membersihkan pesan dari karakter berbahaya untuk mencegah injeksi """
#     allowed_chars = re.compile(r'^[a-zA-Z0-9\s.,!?@#$%^&*()_\-+=]+$')
#     if not allowed_chars.match(message):
#         print("Error: Pesan mengandung karakter tidak diperbolehkan.")
#         sys.exit(1)
#     return message

# def encode(image_path, message, output_path):
#     image_path = os.path.abspath(image_path)
#     output_path = os.path.abspath(output_path)

#     if not os.path.exists(image_path):
#         print(f"Error: File {image_path} tidak ditemukan.")
#         sys.exit(1)

#     if len(message) > MAX_MESSAGE_LENGTH:
#         print(f"Error: Pesan terlalu panjang. Maksimal {MAX_MESSAGE_LENGTH} karakter.")
#         sys.exit(1)

#     message = sanitize_message(message)

#     try:
#         image = Image.open(image_path)
#         encoded_image = stepic.encode(image, message.encode())  
#         encoded_image.save(output_path)
#         print("Encoding Selesai!")
#     except Exception as e:
#         print(f"Error saat encoding: {e}")
#         sys.exit(1)

# def decode(image_path):
#     image_path = os.path.abspath(image_path)

#     if not os.path.exists(image_path):
#         print(f"Error: File {image_path} tidak ditemukan.")
#         sys.exit(1)

#     try:
#         image = Image.open(image_path)
#         decoded_message = stepic.decode(image)

#         # Mencegah output berbahaya
#         if "<script>" in decoded_message or "<" in decoded_message:
#             print("Warning: Pesan yang diekstrak mungkin mengandung skrip berbahaya.")
#             sys.exit(1)

#         print(decoded_message)
#     except Exception as e:
#         print(f"Error saat decoding: {e}")
#         sys.exit(1)

# if __name__ == "__main__":
#     if len(sys.argv) < 3:
#         print("Error: Argumen tidak lengkap.")
#         sys.exit(1)

#     command = sys.argv[1]

#     if command == "encode":
#         if len(sys.argv) < 5:
#             print("Error: Argumen untuk encode tidak lengkap.")
#             sys.exit(1)
#         encode(sys.argv[2], sys.argv[3], sys.argv[4])
#     elif command == "decode":
#         decode(sys.argv[2])
#     else:
#         print("Perintah tidak valid. Gunakan 'encode' atau 'decode'.")