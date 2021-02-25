#start vm minikube, on linux use option vm=docker to avoid a new VM
minikube start --vm-driver=docker --extra-config=apiserver.service-node-port-range=1-35000
#enable ingress controller, manage external access to the cluster, will redirect on nginx serv
minikube addons enable ingress
#enable metrics server on minikube
minikube addons enable metrics-server

#To point your shell to minikube's docker-daemon
eval $(minikube docker-env)

#IP=$(minikube ip)
IP=$(kubectl get node -o=custom-columns='DATA:status.addresses[0].address' | sed -n 2p)

docker build -t ft_nginx ./srcs/nginx
docker build -t ft_ftps  ./srcs/ftps --build-arg IP=${IP}
docker build -t ft_mysql ./srcs/mysql --build-arg IP=${IP}
docker build -t ft_phpmyadmin ./srcs/phpmyadmin 
docker build -t ft_wordpress ./srcs/wordpress --build-arg IP=${IP}
docker build -t ft_influxdb ./srcs/influxdb
docker build -t ft_grafana ./srcs/grafana
docker build -t ft_telegraf ./srcs/telegraf --build-arg IP=${IP}

kubectl apply -f srcs/nginx.yaml
kubectl apply -f srcs/ingress.yaml
kubectl apply -f srcs/ftps.yaml
kubectl apply -f srcs/mysql.yaml
kubectl apply -f srcs/phpmyadmin.yaml
kubectl apply -f srcs/wordpress.yaml
kubectl apply -f srcs/influxdb.yaml
kubectl apply -f srcs/grafana.yaml
kubectl apply -f srcs/telegraf.yaml

#Lets open the website
#open http://$IP

#lance le dashboard k8s
#minikube dashboard
printf "Minikube IP: ${IP}"
